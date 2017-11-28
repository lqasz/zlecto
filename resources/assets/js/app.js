
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import tether from 'tether';
global.Tether = tether;

require('./bootstrap');

import Vue from 'vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = {
  '/': 'Home',
  '/rejestracja': 'Registration'
}

var app = new Vue({
    el: '#app',
    data: {
	    currentRoute: window.location.pathname
	},
	computed: {
		ViewComponent () {
			var component = 'Home';

			if(routes[this.currentRoute] !== undefined && routes[this.currentRoute] !== 'Home') {
				component = routes[this.currentRoute];
			}

			return require('./components/'+component+'/'+component+'.vue');
		}
	},
	render(h) { 
		return h(this.ViewComponent) 
	}
});