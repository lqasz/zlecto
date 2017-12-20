var FormWizard = function () {

    var handleBasicWizardFour = function(){
        var form = $("#basic-wizard-4");

        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.after(error);
            },
            rules: {
                first_name: {
                    minlength: 3,
                    letterOnlyName: true,
                    required: true,
                    firstUpName: true,
                    restDownName: true
                },
                last_name: {
                    minlength: 2,
                    letterOnlySurname: true,
                    required: true,
                    firstUpSurname: true,
                    restDownSurname: true
                },
                phone_number: {
                    required: true,
                    minlength: 7,
                    maxlength: 15,
                    telephoneFormat: true
                },
                email: {
                    required: true,
                    emal: true,
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
                }
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
                  firstUpSurname: "Nazwisko musi zaczynać się z dużej litery!",
                  restDownSurname: "Duża litera dozwolona jest tylko na początku nazwiska lub każdego jego członu!",
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
                  email: "Adres e-mail msi zawierać znak \"@\"!",
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
              }
            }
        });

        jQuery.validator.addMethod("firstUpName",function(value, element) {
          return this.optional(element) || /^[A-Z]{1}.{1,}( [A-Z]{1}.{1,})?$/.test(value);
        });

        jQuery.validator.addMethod("restDownName",function(value, element) {
          return this.optional(element) || /^.[a-z ]{1,}$/.test(value);
        });

        jQuery.validator.addMethod("letterOnlyName",function(value, element) {
          return this.optional(element) || /^[A-Z ]{1,}$/i.test(value);
        });

        jQuery.validator.addMethod("firstUpSurname",function(value, element) {
          return this.optional(element) || /^[A-Z]{1}.{1,}(( |\-)[A-Z]{1}.{1,})?(( |\-)[A-Z]{1}.{1,})?$/.test(value);
        });

        jQuery.validator.addMethod("restDownSurname",function(value, element) {
          return this.optional(element) || /^.[a-z -]{1,}$/.test(value);
        });

        jQuery.validator.addMethod("letterOnlySurname",function(value, element) {
          return this.optional(element) || /^[A-Z -]{1,}$/i.test(value);
        });

        jQuery.validator.addMethod("emailFormat",function(value, element) {
          return this.optional(element) || /^[0-9a-z_.-]+@[^.-]{1}[0-9a-z.-]*[0-9a-z]+\.[^.-]{1}[0-9a-z.-]{2,30}[^.-]{1}$/i.test(value);
        });

        jQuery.validator.addMethod("telephoneFormat",function(value, element) {
          return this.optional(element) || /^[0-9+() ]{1,}$/.test(value);
        });

        jQuery.validator.addMethod("passwordFormat",function(value, element) {
          return this.optional(element) || /^(?=.*[!@#$%])(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[0-9a-zA-Z\!\@\#\$\%]{1,}$/.test(value);
        });


        form.steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            onStepChanging: function (event, currentIndex, newIndex) {
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
