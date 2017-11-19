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
                    <label for="name">Imię i nazwisko</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                            <input name="imie_nazwisko" class="form-control" id="name" placeholder="Jan Kowalski" required="" autofocus="" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle hide empty">
                            <i class="fa fa-close"> Podaj imię i nazwisko</i>
                        </span>
                        <span class="text-danger align-middle hide not_valid_format">
                            <i class="fa fa-close"> Błędne imię lub nazwisko</i>
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
                            <input name="email" class="form-control" id="email" placeholder="jan.kowalski@przyklad.pl" required="" autofocus="" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle hide empty">
                            <i class="fa fa-close"> Podaj adres email</i>
                        </span>
                        <span class="text-danger align-middle hide not_valid_format">
                            <i class="fa fa-close"> Błędny adres email</i>
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
                            <input name="nr_telefonu" class="form-control" id="phone-number" placeholder="+48 123 456 789" required="" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle hide empty">
                            <i class="fa fa-close"> Podaj numer telefonu</i>
                        </span>
                        <span class="text-danger align-middle hide not_valid_format">
                            <i class="fa fa-close"> Błędny format numeru telefonu</i>
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
                            <input name="haslo" class="form-control" id="example-progress-bar" placeholder="min. 10 znaków" required="" type="password">
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
                        <span class="text-danger align-middle hide not_valid_format">
                            <i class="fa fa-close"> Hasło nie spełnia wymagań</i>
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
                            <input name="ponownie_haslo" class="form-control" id="password-confirm" placeholder="powtórz hasło" required="" type="password">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle hide empty">
                            <i class="fa fa-close"> To pole jest wymagane</i>
                        </span>
                        <span class="text-danger align-middle hide haslo_not_valid_format">
                            <i class="fa fa-close"> Hasła różne</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success" v-on:click="registration">
                        <i class="fa fa-user-plus"></i> Zarejestruj
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data: function() {
            let token = document.head.querySelector('meta[name="csrf-token"]');

            return {
                csrf: token.content
            }
        },

        methods: {
            registration: function(e) {
                e.preventDefault();

                var self = this,
                    fields = {},
                    validation = {
                        'empty': {},
                        'not_valid_format': {},
                    };

                $('.hide').css("display", "none");
                $('.form-control').each(function(index, el) {
                    var value = $(el).val(),
                        name = $(el).attr('name'),
                        $parent = $(el).parents('.row');

                    if(value != "" && value.length > 0) {
                        if(self.validateField(name, value)) {
                            fields[name] = value;
                        } else {
                            validation.not_valid_format[name] = {
                                "parent": $parent
                            };
                        }
                    } else {
                        validation.empty[name] = {
                            "parent": $parent
                        };

                        return;
                    }
                });

                let simple_validation = true;
                for(var key in validation) {
                    if(!validation.hasOwnProperty(key)) continue;

                    var object = validation[key];
                    for(var field in object) {
                        var element = object[field],
                            $message = $(element.parent);

                        if($message.length > 0) {
                            simple_validation = false;   
                        }

                        $message.find('.'+key).slideDown("slow/400");
                    }
                }
                
                if(simple_validation) {
                    if(fields['ponownie_haslo'] === fields['haslo']) {
                        fields['_token'] = this.csrf;

                        $.ajax({
                            type: "POST",
                            url: "rejestracja",
                            data: fields,
                            success: function(data) {
                                console.info(data);
                            },                            
                        });
                    } else {
                        $('.haslo_not_valid_format').slideDown("slow/400");
                    }
                }
            },

            validateField: function(name, value) {
                var valid = true;

                if(name == "imie_nazwisko") {
                    valid = value.length > 6;
                } else if(name == "email") {
                    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                    valid = regex.test(value);
                } else if(name == "nr_telefonu") {
                    var value = value.trim(),
                        regex = /^\+?([0-9]{2})\)?[- ]?([0-9]{3})[- ]?([0-9]{3})[- ]?([0-9]{3})$/;

                    valid = regex.test(value);
                } else if(name == "haslo") {
                    valid = value.length > 9;
                }

                return valid;
            },
        },
    }
</script>