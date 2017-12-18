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
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                phone_number: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 8,
                    required: true
                },
                password_confirmation: {
                    equalTo: "#password"
                }
            }
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
                })
                .catch(function (error) {
                    console.log(error);
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
