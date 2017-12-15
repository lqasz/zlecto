var FormWizard = function () {

    var handleBasicWizardFour = function(){
        $("#basic-wizard-4").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true
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
