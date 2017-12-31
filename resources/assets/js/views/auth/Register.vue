<template>
    <div class="card">
        <div class="card-header">
            <form @submit="validateBeforeSubmit">
                <section v-if="step === 1" class="form-wraper">
                    <h3>Krok 1</h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                          <div :class="{'form-group' : true , 'has-danger' : errors.has('name') , 'has-success': !errors.has('name') && fields.name.touched }">
                              <label>Imię</label>
                              <input v-model.lazy="registerData.name" v-validate="'required|min:3|alpha_spaces'"
                                     :class="{'form-control-danger': errors.has('name'), 'form-control-success': !errors.has('name') }"
                                     class="form-control" name="name" type="text" placeholder="Jan">
                              <span class="form-control-feedback" v-if="errors.has('name')">{{ errors.first('name') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('surname') , 'has-success': !errors.has('surname') && fields.surname.touched }">
                              <label>Nazwisko</label>
                              <input v-model.lazy="registerData.surname" v-validate="'required|min:2|alpha_spaces'"
                                     :class="{'form-control-danger': errors.has('surname') , 'form-control-success': !errors.has('surname') }"
                                     class="form-control" name="surname" type="text" placeholder="Kowalski">
                              <span class="form-control-feedback" v-show="errors.has('surname')">{{ errors.first('surname') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger' : errors.has('password')  , 'has-success': !errors.has('password') && fields.password.touched }">
                              <label>Hasło</label>
                              <input v-model.lazy="registerData.password" v-validate="{ required: true, min: 8, max: 16, regex: /^(?=.*[!@#$%])(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[0-9a-zA-Z\!\@\#\$\%]{1,}$/ }"
                                     :class="{'form-control-danger': errors.has('password') , 'form-control-success': !errors.has('password') }"
                                     class="form-control" name="password" type="password">
                               <span class="form-control-feedback" v-show="errors.has('password')">{{ errors.first('password') }}</span>
                          </div>
                       </div>
                       <div class="col-lg-6">
                          <div :class="{'form-group' : true , 'has-danger': errors.has('email') , 'has-success': !errors.has('email') && fields.email.touched }">
                              <label>e-mail</label>
                              <input v-model.lazy="registerData.email" v-validate="'required|email'"
                                     :class="{'form-control-danger': errors.has('email') , 'form-control-success': !errors.has('email') }"
                                     class="form-control" name="email" type="text" placeholder="jan_kowalski@gmail.com">
                              <span class="form-control-feedback" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('phone') ,  'has-success': !errors.has('phone') && fields.phone.touched}">
                              <label>Numer telefonu</label>
                              <input v-model.lazy="registerData.phone" v-validate="{ required: true, min: 7, max: 15, regex: /^[0-9+() ]{1,}$/ }"
                                     :class="{'form-control-danger': errors.has('phone') , 'form-control-success': !errors.has('phone') }"
                                     class="form-control" name="phone" type="text" placeholder="111-222-333">
                              <span class="form-control-feedback" v-show="errors.has('phone')">{{ errors.first('phone') }}</span>
                          </div>
                          <div :class="{'form-group' : true , 'has-danger': errors.has('password_conf') , 'has-success': !errors.has('password_conf') && fields.password_conf.touched }">
                              <label>Potwtórz hasło</label>
                              <input v-model.lazy="registerData.password_conf"  v-validate="'required|confirmed:haslo'"
                                     :class="{'form-control-danger': errors.has('password_conf') , 'form-control-success': !errors.has('password_conf') }"
                                     class="form-control" name="password_conf" type="password">
                              <span class="form-control-feedback" v-show="errors.has('password_conf')">{{ errors.first('password_conf') }}</span>
                          </div>
                      </div>
                  </div>
                </section>
                <section v-if="step === 2" class="form-wraper">
                    <h3>Krok 2</h3>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Województwo</label>
                              <select class="form-control ls-select2" name="region">
                                  <option selected disabled>Wybierz województwo</option>
                                  <option v-for="region in regiony">{{ region }}</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Ulica i numer</label>
                              <input class="form-control" rows="3" name="adres" tabindex="9" placeholder="Słoneczna 1">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group">
                              <label>Miasto lub miejscowość</label>
                              <input type="text" class="form-control" name="city" tabindex="8"placeholder="Placuszkowo" >
                          </div>
                          <div class="form-group">
                              <label>Kod pocztowy</label>
                              <input type="text" class="form-control" name="postal_code" tabindex="10" placeholder="00-000">
                          </div>
                      </div>
                  </div>
             </section>
             <div class="buttons-register">
                <button type="button" class="btn btn-primary btn-register" v-if="step !== 1"@click="piervousStep">Wstecz</button>
                <button type="button" class="btn btn-primary btn-register" v-if="step < 2" @click="nextStep">Dalej</button>
                <button class="btn btn-primary btn-register" v-if="step === 2">Zarejestruj</button>
             </div>
          </form>
       </div>
    </div>
</template>

<script type="text/babel">
    import Auth from '../../services/auth'

    export default {
        data() {
            return {
                step: 1,
                registerData: {
                    name: null,
                    surname: null,
                    password: null,
                    email: null,
                    phone: null,
                    password_conf: null

                },
                regiony: ["dolnośląskie","kujawsko-pomorskie","lubelskie","lubuskie",
                        "łódzkie","małopolskie","mazowieckie","opolskie",
                        "podkarpackie","podlaskie","pomorskie","śląskie",
                        "świętokrzyskie","warmińsko-mazurskie","wielkopolskie","zachodniopomorskie"],
            }
        },
        methods: {
            nextStep(){

                this.step++;
            },
            piervousStep(){
                this.step--;
            },
            validateBeforeSubmit(e){
                this.$validator.validateAll();

                if (!this.errors.any()) {
                    Auth.register(this.registerData).then(() => {
                        // this.$router.push('/login')
                    })
                }
            }
        },
    }
</script>
