var FormWizard = function () {

    var handleBasicWizardFour = function(){
        var form = $("#basic-wizard-4");

        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                first_name: {
                    required: true,
                    minlength: 3,
                    letterOnlyName: true,
                    firstUpName: true,
                    restDownName: true
                },
                last_name: {
                    required: true,
                    minlength: 2,
                    firstUpOnPart: true,
                    firstUpOnPart: true,
                    restDownOnPart: true
                },
                phone_number: {
                    required: true,
                    minlength: 7,
                    maxlength: 15,
                    telephoneFormat: true
                },
                email: {
                    required: true,
                    emailFormat: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    passwordFormat: true
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",

                },
                adres: {
                  required: true,
                  adresValid: true
                },
                city: {
                  required: true,
                  minlength: 2,
                  firstUpOnPart: true,
                  firstUpOnPart: true,
                  restDownOnPart: true
                },
                post_code: {
                    required: true,
                    postValid: true
                },
            },
            messages: {
              first_name: {
                  required: "To pole jest wymagane!",
                  minlength: "Imię powinno się składać prznajmiej z 3 znaków!",
                  firstUpName: "Imię musi zaczynać się z dużej litery!",
                  restDownName: "Duża litera dozwolona jest tylko na początku imienia!",
                  letterOnlyName: "Imię musi zawierać same litery!"
              },
              last_name: {
                  required: "To pole jest wymagane!",
                  minlength: "Nazwisko powinno się składać prznajmiej z 2 znaków!",
                  firstUpOnPart: "Nazwisko musi zaczynać się z dużej litery!",
                  restDownSurname: "Duża litera dozwolona jest tylko na początku nazwiska lub każdej jego części!",
                  letterOnlySurname: "Imię musi zawierać same litery!"
              },
              phone_number: {
                  required: "To pole jest wymagane!",
                  minlength: "Zbyt krótki numer!",
                  maxlength: "Zbyt długi numer!",
                  telephoneFormat: "Błędny format numru telefonu!"
              },
              email: {
                  required: "To pole jest wymagane!",
                  emailFormat: "Błędny format e-mail!"
              },
              password: {
                  minlength: "Hasło powinno się składać przynajmiej z 8 znaków!",
                  passwordFormat: "Hsało musi składać się z dużych i małych liter, cyfr i przynajmniej jednego z wymienionych znaków specjalnych: \"!\",\"@\",\"#\",\"$\",\"%\"",
                  required: "To pole jest wymagane!"
              },
              password_confirmation: {
                  required: "To pole jest wymagane!",
                  equalTo: "Hasła nie są identyczne!"
              },
              adres: {
                required: "To pole jest wymagane!",
                adresValid: "To pole jest wymagane!"
              },
              city: {
                  required: "To pole jest wymagane!",
                  minlength: "Nazwa misata powinna się składać prznajmiej z 2 znaków!",
                  firstUpOnPart: "Nazwa m musi zaczynać się z dużej litery!",
                  restDownPart: "Duża litera dozwolona jest tylko na początku nazwiska lub każdej jego części!",
                  letterOnlyOnPart: "Imię musi zawierać same litery!"
              },
              post_code: {
                  required: "To pole jest wymagane!",
                  postValid: "Błędny format kodu pocztowego"
              },

            }
        });

        jQuery.validator.addMethod("firstUpName",function(value, element) {
          return this.optional(element) || /^[A-ZŁŚĆĄŻŹÓŃĄĘ]{1}.{1,}( [A-Z]{1}.{1,})?$/.test(value);
        });

        jQuery.validator.addMethod("restDownName",function(value, element) {
          return this.optional(element) || /^.[a-ząęóśćżźńł ]{1,}$/.test(value);
        });

        jQuery.validator.addMethod("letterOnlyName",function(value, element) {
          return this.optional(element) || /^[A-ZŁŚĆĄŻŹÓŃĄĘ ]{1,}$/i.test(value);
        });

        jQuery.validator.addMethod("firstUpOnPart",function(value, element) {
          return this.optional(element) || /^[A-ZŁŚĆĄŻŹÓŃĄĘ]{1}.{1,}(( |\-)[A-Z]{1}.{1,})?(( |\-)[A-Z]{1}.{1,})?$/.test(value);
        });

        jQuery.validator.addMethod("restDownOnPart",function(value, element) {
          return this.optional(element) || /^.[a-ząęóśćżźńł -]{1,}$/.test(value);
        });

        jQuery.validator.addMethod("letterOnlyOnPart",function(value, element) {
          return this.optional(element) || /^[A-ZŁŚĆĄŻŹÓŃĄĘ -]{1,}$/i.test(value);
        });

        jQuery.validator.addMethod("emailFormat",function(value, element) {
          return this.optional(element) || /^[0-9a-z_.-]+@[^.-]{1}[0-9a-z.-]+\.[0-9a-z.-]{1,28}$/i.test(value);
        });

        jQuery.validator.addMethod("telephoneFormat",function(value, element) {
          return this.optional(element) || /^[0-9+() ]{1,}$/.test(value);
        });

        jQuery.validator.addMethod("passwordFormat",function(value, element) {
          return this.optional(element) || /^(?=.*[!@#$%])(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[0-9a-zA-Z\!\@\#\$\%]{1,}$/.test(value);
        });

        jQuery.validator.addMethod("adresValid",function(value, element) {
          return this.optional(element) || /^[A-Z0-9\- \/]$/i.test(value);
        });

        jQuery.validator.addMethod("postValid",function(value, element) {
          return this.optional(element) || /^[0-9]{2}-[0-9]{3}$/.test(value);
        });

        form.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slide",
            autoFocus: true,
            onStepChanging: function (event, currentIndex, newIndex) {
                if (currentIndex > newIndex) return true;
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                var data = {},
                    fieldsArray = form.serializeArray();

                for(var i = 0; i < fieldsArray.length; i++) {
                    data[fieldsArray[i].name] = fieldsArray[i].value;
                }

                axios.post("v1/register", {
                    _token: data._token,
                    first_name: data.first_name,
                    last_name: data.last_name,
                    email: data.email,
                    phone_number: data.phone_number,
                    password: data.password,
                    password_confirmation: data.password_confirmation,
                  }).then(function (response) {
                      console.log(response);
                  }).catch(function (error) {
                      console.error(error);
                  });
            }
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            handleBasicWizardFour();
        }
    };

}();

$.Deferred(function() {
    FormWizard.init();
});
