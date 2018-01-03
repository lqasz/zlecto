<template>
    <div class="card">
        <div class="card-header">
            <form @submit="validateBeforeSubmit">
                <section v-show="step === 1" class="form-wraper">
                    <h3>Krok 1</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                          <div :class="{'form-group' : true , 'has-danger' : errors.has('name') , 'has-success': !errors.has('name') && fields.name.touched && fields.name.dirty }">
                              <label>Imię</label>
                              <input v-model="registerData.name" v-validate="'required|min:3|alpha_spaces'" data-vv-delay="500"
                                     :class="{'form-control-danger': errors.has('name'), 'form-control-success': !errors.has('name') }"
                                     class="form-control" name="name" type="text" placeholder="Jan">
                              <span class="form-control-feedback" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('surname') , 'has-success': !errors.has('surname') && fields.surname.touched && fields.surname.dirty}">
                              <label>Nazwisko</label>
                              <input v-model="registerData.surname" v-validate="'required|min:2|alpha_spaces'" data-vv-delay="500"
                                     :class="{'form-control-danger': errors.has('surname') , 'form-control-success': !errors.has('surname') }"
                                     class="form-control" name="surname" type="text" placeholder="Kowalski">
                              <span class="form-control-feedback" v-show="errors.has('surname')">{{ errors.first('surname') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger' : errors.has('password')  , 'has-success': !errors.has('password') && fields.password.touched && fields.password.dirty}">
                              <label>Hasło</label>
                              <input v-model="registerData.password" v-validate="{ required: true, min: 8, max: 16, regex: /^(?=.*[!@#$%])(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[0-9a-zA-Z\!\@\#\$\%]{1,}$/ }" data-vv-delay="500"
                                     :class="{'form-control-danger': errors.has('password') , 'form-control-success': !errors.has('password') }"
                                     class="form-control" name="password" type="password">
                               <span class="form-control-feedback" v-show="errors.has('password')">{{ errors.first('password') }}</span>
                          </div>
                       </div>
                       <div class="col-lg-6">
                          <div :class="{'form-group' : true , 'has-danger': errors.has('email') , 'has-success': !errors.has('email') && fields.email.touched && fields.email.dirty}">
                              <label>e-mail</label>
                              <input v-model="registerData.email" v-validate="'required|email'" data-vv-delay="500"
                                     :class="{'form-control-danger': errors.has('email') , 'form-control-success': !errors.has('email') }"
                                     class="form-control" name="email" type="text" placeholder="jan_kowalski@gmail.com">
                              <span class="form-control-feedback" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('phone') ,  'has-success': !errors.has('phone') && fields.phone.touched && fields.phone.dirty}">
                              <label>Numer telefonu</label>
                              <input v-model="registerData.phone" v-validate="{ required: true, min: 7, max: 15, regex: /^[0-9+() ]{1,}$/ }" data-vv-delay="500"
                                     :class="{'form-control-danger': errors.has('phone') , 'form-control-success': !errors.has('phone') }"
                                     class="form-control" name="phone" type="text" placeholder="111-222-333">
                              <span class="form-control-feedback" v-show="errors.has('phone')">{{ errors.first('phone') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('password_conf') , 'has-success': !errors.has('password_conf') && fields.password_conf.touched && fields.password_conf.dirty }">
                              <label>Potwtórz hasło</label>
                              <input v-model="registerData.password_conf"  v-validate="'required|confirmed:password'" data-vv-delay="500"
                                     :class="{'form-control-danger': errors.has('password_conf') , 'form-control-success': !errors.has('password_conf') }"
                                     class="form-control" name="password_conf" type="password">
                              <span class="form-control-feedback" v-show="errors.has('password_conf')">{{ errors.first('password_conf') }}</span>
                          </div>
                      </div>
                  </div>
                </section>
                <section v-show="step === 2" class="form-wraper">
                    <h3>Krok 2</h3>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6">
                          <div :class="{'form-group' : true , 'has-danger': errors.has('region') , 'has-success': !errors.has('region') && fields.region.touched && fields.region.dirty }">
                              <label>Województwo</label>
                              <div class="form-select">
                                   <v-select :options="regiony" v-model="registerData.region" placeholder="Wybierz województwo" v-validate="'required'" data-vv-name="region"></v-select>
                              </div>
                              <span class="form-control-feedback" v-show="errors.has('region')">{{ errors.first('region') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('adres') , 'has-success': !errors.has('adres') && fields.adres.touched && fields.adres.dirty }">
                              <label>Ulica i numer</label>
                              <input v-model="registerData.adres"  v-validate="{ required: true, min: 4, regex: /^[A-Za-zĘęÓóĄąŚśŁłŻżŹźĆćŃń0-9-\/ ]{4,}$/ }" data-vv-delay="1000"
                                     :class="{'form-control-danger': errors.has('adres') , 'form-control-success': !errors.has('adres') }"
                                     class="form-control" name="adres" type="text">
                              <span class="form-control-feedback" v-show="errors.has('adres')">{{ errors.first('adres') }}</span>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div :class="{'form-group' : true , 'has-danger': errors.has('city') , 'has-success': !errors.has('city') && fields.city.touched && fields.city.dirty }">
                              <label>Miasto lub miejscowość</label>
                              <input v-model="registerData.city"  v-validate="'required|min:2|alpha_spaces'" data-vv-delay="1000"
                                     :class="{'form-control-danger': errors.has('city') , 'form-control-success': !errors.has('city') }"
                                     class="form-control" name="city" type="text">
                              <span class="form-control-feedback" v-show="errors.has('city')">{{ errors.first('city') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('post_code') , 'has-success': !errors.has('post_code') && fields.post_code.touched && fields.post_code.dirty }">
                              <label>Kod pocztowy</label>
                              <input v-model="registerData.post_code"  v-validate="{ required: true, min: 4, regex: /^[0-9]{2}-[0-9]{3}$/ }" data-vv-delay="1000"
                                     :class="{'form-control-danger': errors.has('post_code') , 'form-control-success': !errors.has('post_code') }"
                                     class="form-control" name="post_code" type="text">
                              <span class="form-control-feedback" v-show="errors.has('post_code')">{{ errors.first('post_code') }}</span>
                          </div>
                      </div>
                  </div>
             </section>
             <div class="buttons-register">
                <button type="button" class="btn btn-primary btn-register" v-if="step !== 1"@click="piervousStep" >Wstecz</button>
                <button type="button" class="btn btn-primary btn-register" v-if="step < 2" @click="nextStep" @mousemove="firstStepValidation">Dalej </button>
                <button class="btn btn-primary btn-register" v-if="step === 2">Zarejestruj </button>
             </div>
          </form>
       </div>
    </div>
</template>

<script type="text/babel">
    import Auth from '../../services/auth';

    export default {
        data() {
            return {
                step: 1,
                registerData: {
                    name: null, surname: null, password: null, email: null, phone: null,
                    password_conf: null, region: null, aders: null, city: null, post_code: null
                },
                regiony: ["dolnośląskie","kujawsko-pomorskie","lubelskie","lubuskie",
                          "łódzkie","małopolskie","mazowieckie","opolskie",
                          "podkarpackie","podlaskie","pomorskie","śląskie",
                          "świętokrzyskie","warmińsko-mazurskie","wielkopolskie","zachodniopomorskie"],
            }
        },
        methods: {
            nextStep(){
              if(!this.errors.any()){
                this.step++;
              }
            },
            firstStepValidation(){
                this.$validator.validate('name', this.registerData.name);
                this.$validator.validate('surname', this.registerData.surname);
                this.$validator.validate('password', this.registerData.password);
                this.$validator.validate('email', this.registerData.email);
                this.$validator.validate('phone', this.registerData.phone);
                this.$validator.validate('password_conf', this.registerData.password_conf);
            },
            piervousStep(){
                this.step--;
            },
            onChange: function(){
              console.log(this.registerData.region);
            },
            validateBeforeSubmit(e){
                this.$validator.validateAll();
                if(this.errors.any()){
                    return;
                }
               else if (!this.errors.any()) {
                    Auth.register(this.registerData).then(() => {
                        // this.$router.push('/login')
                    })
                }
            }
        },
    }
</script>
