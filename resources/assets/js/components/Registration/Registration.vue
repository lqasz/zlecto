<template>
    <div class="container">
        <form class="form-horizontal">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Rejestracja</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <input name="_token" :value="csrf" type="hidden">
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Imię</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                            <input name="imie" id="name" placeholder="Jan" type="text"
                                   class="form-control" v-validate="'required|alpha|min:3'" v-model="inputValues.name">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i class="fa fa-close" v-show="errors.has('imie')">{{ errors.first('imie') }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Nazwisko</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                            <input name="nazwisko" id="surname" placeholder="Kowalski" type="text"
                                   class="form-control" v-validate="'required|alpha|min:3'" v-model="inputValues.surname">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i class="fa fa-close" v-show="errors.has('nazwisko')">{{ errors.first('nazwisko') }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="email">Adres email</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                      <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input name="email" id="email"  placeholder="jan.kowalski@przyklad.pl" type="text"
                               class="form-control" v-validate="'required|email'" v-model="inputValues.email" >
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i class="fa fa-close" v-show="errors.has('email')">{{ errors.first('email') }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Numer telefonu</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <input name="telefon" id="phone-number" placeholder="+48 123 456 789" required="" type="text"
                                    class="form-control" v-validate="'required'" v-model="inputValues.telephone">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i class="fa fa-close" v-show="errors.has('telefon')">{{ errors.first('telefon') }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Podaj hasło</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input name="haslo" id="example-progress-bar" placeholder="min. 8 znaków" type="password"
                                   class="form-control" v-validate="'required|min:8'" v-model="inputValues.password1">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i class="fa fa-close" v-show="errors.has('haslo')">{{ errors.first('haslo') }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Powtórz hasło</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-repeat"></i>
                            </div>
                            <input name="hasloSprawdzenie" id="password-confirm" placeholder="powtórz hasło" type="password"
                                   class="form-control" v-validate="'required|confirmed:haslo'" v-model="inputValues.password2">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle haslo_not_valid_format">
                            <i class="fa fa-close" v-show="errors.has('hasloSprawdzenie')">{{ errors.first('hasloSprawdzenie')}}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-user-plus"></i> Zarejestruj
                    </button>
                </div>
                <span class="text-danger align-middle hide empty">
                    <i class="fa fa-close"> Wypełnij Wszystkie pola</i>
                </span>
            </div>
        </form>
    </div>
</template>

<script src="./Registration_Code.vue"></script>
