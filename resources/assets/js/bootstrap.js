import VueRouter from 'vue-router'
import VeeValidate from 'vee-validate';
import Axios from 'axios';
import Ls from './services/ls'
import vSelect from 'vue-select';
import { Validator } from 'vee-validate';

window._ = require('lodash');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');


/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Interceptors
 */

axios.interceptors.request.use(function (config) {
    // Do something before request is sent
    const AUTH_TOKEN = Ls.get('auth.token');

    if(AUTH_TOKEN){
        config.headers.common['Authorization'] = `Bearer ${AUTH_TOKEN}`
    }

    return config;
}, function (error) {
    // Do something with request error
    return Promise.reject(error);
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

Vue.component('v-select', vSelect);

Vue.use(VueRouter)

Vue.use(VeeValidate);

const dict = {
  custom: {

    name: {
      required: 'To pole jest wymagane!',
      alpha_spaces: 'Imię musi się składać z samych liter!',
      min: 'Imię musi skadać się z co najmniej 3 liter!'
    },
    surname: {
      required: 'To pole jest wymagane!',
      alpha_spaces: 'Nazwisko musi się składać z samych liter!',
      min: 'Nazwisko musi składać się z co najmniej 2 liter!'
    },
    password: {
      required: 'To pole jest wymagane!',
      min: 'Hasło musi skadać się z co najmniej 8 znaków!',
      max: 'Hasło może skadać się maksymalnie z 16 znaków!',
      regex: "Hasło musi składać się z dużych i małych liter, cyfr i przynajmniej jednego z wymienionych znaków specjalnych: \"!\",\"@\",\"#\",\"$\",\"%\""
    },
    email: {
      required: 'To pole jest wymagane!',
      email: 'Błędny format adresu e-mail!',
    },
    phone: {
        required: 'To pole jest wymagane!',
        min: "Zbyt krótki numer!",
        max: "Zbyt długi numer!",
        regex: "Błędny format numeru telefonu!"
    },
    password_conf: {
        required: 'To pole jest wymagane!',
        required: "To pole jest wymagane!",
        confirmed: "Hasła nie są identyczne!"
    },
    adres: {
        required: 'To pole jest wymagane!',
        min: "Ulica i numer musi zawierć co najmniej 4 znaki!",
        regex: "To pole może zawierać tylko litery cyfry znaki spacji i znaki specialne: \"-\", \"/\""
    },
    city: {
        required: 'To pole jest wymagane!',
        minlength: "Nazwa misata powinna się składać prznajmiej z 2 znaków!",
        alpha_spaces: "Nazwa miasta musi zawierać same litery!"
    },
    post_code: {
        required: "To pole jest wymagane!",
        regex: "Błędny format kodu pocztowego"
    }
  }
};

Validator.localize('pl', dict);

Validator.localize('pl');
