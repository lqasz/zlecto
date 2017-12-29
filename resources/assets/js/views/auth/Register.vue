<template>
    <div class="card">
        <div class="card-header">
            <form id="registerForm" method="post" @submit.prevent="validateBeforeSubmit">
                <h3>Krok 1</h3>
                <section>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Imię</label>
                            <input type="text" class="form-control" name="first_name" tabindex="1" placeholder="Jan">
                        </div>
                        <div class="form-group">
                            <label>Nazwisko</label>
                            <input type="text" class="form-control" name="last_name" tabindex="2" placeholder="Kowalski">
                        </div>
                        <div class="form-group">
                            <label>Hasło</label>
                            <input type="password" class="form-control" id="password" name="password" tabindex="5">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" tabindex="3" placeholder="jankowalski@gmai.com">
                        </div>
                        <div class="form-group">
                            <label>Nr. telefonu</label>
                            <input type="text" class="form-control" name="phone_number" tabindex="4" placeholder="111 222 333">
                        </div>
                        <div class="form-group">
                            <label>Potwierdź hasło</label>
                            <input type="password" class="form-control"  name="password_confirmation" tabindex="6">
                        </div>
                    </div>
                </div>
            </section>
            <h3>Krok 2</h3>
            <section>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Województwo</label>
                            <select class="form-control" name="region">
                                <option selected disabled>Wybierz województwo</option>
                                <option v-for="rerion in regiony">{{ region }}</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label>Ulica i numer</label>
                        <input class="form-control" rows="3" name="adres" tabindex="9" placeholder="Słoneczna 1"></textarea>
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
    </form>
</div>
</div>
</template>

<script type="text/babel">
    import Auth from '../../services/auth'

    export default {
        data() {
            return {
                registerData: {},
                regiony: ["dolnośląskie","kujawsko-pomorskie","lubelskie","lubuskie",
                        "łódzkie","małopolskie","mazowieckie","opolskie",
                        "podkarpackie","podlaskie","pomorskie","śląskie",
                        "świętokrzyskie","warmińsko-mazurskie","wielkopolskie","zachodniopomorskie"],
            }
        },
        methods: {
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
