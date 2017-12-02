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
                            <input name="imie" class="form-control" id="name" placeholder="Jan" required="" autofocus="" type="text" @keyup="edit">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i v-if="errName" class="fa fa-close">{{ errName }}</i>
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
                            <input name="nazwisko" class="form-control" id="surname" placeholder="Kowalski" required="" autofocus="" type="text" @keyup="edit">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i v-if="errSurname"class="fa fa-close">{{ errSurname }}</i>
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
                            <input name="email" class="form-control" id="email" placeholder="jan.kowalski@przyklad.pl" required="" autofocus="" type="text" @keyup="edit" >
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback" v-if="Email[2]">
                        <span class="text-danger align-middle hide empty">
                            <i class="fa fa-close"> Podaj adres email</i>
                        </span>
                        <span class="text-danger align-middle not_valid_format">
                            <i v-if="errEmail" class="fa fa-close">{{ errEmail }}</i>
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
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <input name="nr_telefonu" class="form-control" id="phone-number" placeholder="+48 123 456 789" required="" type="text" @keyup="edit">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle hide empty">
                            <i class="fa fa-close"> Podaj numer telefonu</i>
                        </span>
                        <span class="text-danger align-middle not_valid_format">
                            <i v-if="errTele" class="fa fa-close"> {{ errTele }}</i>
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
                            <input name="haslo" class="form-control" id="example-progress-bar" placeholder="min. 8 znaków" required="" type="password" @keyup="edit">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle hide empty">
                            <i class="fa fa-close"> To pole jest wymagane</i>
                        </span>
                    </div>
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle not_valid_format">
                            <i v-if="errPass1" class="fa fa-close"> {{ errPass1 }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Podaj ponownie hasło</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-repeat"></i>
                            </div>
                            <input name="ponownie_haslo" class="form-control" id="password-confirm" placeholder="powtórz hasło" required="" type="password" @keyup="edit">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle haslo_not_valid_format">
                            <i v-if="errPass2" class="fa fa-close"> {{ errPass2 }}</i>
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
