export default {
    data: function() {
        var token = document.head.querySelector('meta[name="csrf-token"]');

        return {
            csrf: token.content,
            errName: "",
            errSurname: "",
            errTele: "",
            errEmail: "",
            errPass1: "",
            errPass2: "",
        }
    },

    methods: {
    	edit: function(e) {
    		
    		var err = false;
    		var $element = $(e.target);
    		var name = $element.attr("name");

    		if(name === "imie") {
    			this.errName = "";

    			if($element.val().length < 3) {  
    				this.errName += "Imię powninno składać się z co najmniej trzech liter";
    				err = true;
    			}

    			var regex = /^[^0-9\.\*\/\?\:\;\,\^\+\\\=\|!@#$%&()"'\-\_<>]*$/;

    			if(!regex.test(($element.val()))){
    				if(err)this.errName +="i nie może zawierać znaków specjalnych ani cyfr";
    				else this.errName +="Imię nie może zawierać znaków specjalnych ani cyfr";
    			}
    		}

    		if(name === "nazwisko") {
    			this.errSurname = "";
    			if($element.val().length < 3) {  
    				this.errSurname += "Nazwisko powninno składać się z co najmniej trzech liter";
    				err = true;
    			}

    			var regex = /^[^0-9\.\*\/\?\:\;\,\^\+\\\=\|!@#$%&()"'\-\_<>]*$/;

    			if(!regex.test(($element.val()))){
    				if(err)this.errSurname +="i nie może zawierać znaków specjalnych ani cyfr";
    				else this.errSurname +="Nazwisko nie może zawierać znaków specjalnych ani cyfr";
    			}
    		}

    		if(name === "email") {
    			this.errEmail = "";
    		    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(!regex.test(($element.val()))) this.errEmail = "Błędny format email";

            }

            //opisac format emaila
            if(name === "nazwisko") {
    			this.errEmail = "";
    		    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(!regex.test(($element.val()))) this.errEmail = "Błędny format email";

            }

    		err = false;
    		console.log(this.test);
    	},


        registration: function(e) {
            e.preventDefault();
 			
            console.log("info", this);

            var self = this,
                fields = {},
                validation = {
                    'empty': {},
                    'not_valid_format': {},
                };

           // $('.hide').css("display", "none");
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
                valid = value.length > 6 && value.indexOf(' ') >= 3;

            } else if(name == "email") {
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                valid = regex.test(value);

            } else if(name == "nr_telefonu") {
                var value = value.trim(),
                    regex = /^\+?([0-9]{2})\)?[- ]?([0-9]{3})[- ]?([0-9]{3})[- ]?([0-9]{3})$/;

                valid = regex.test(value);

            } else if(name == "haslo") {
                valid = value.length > 7;

                regex =/^[a-z]*$/;

                regex =/^[A-Z]*$/;

                regex =/^[0-9]*$/;

                regex =/^[!@#$%^&\*]*$/;

                regex = /^[^-_()<>\[\{\]\}\?\/\|\\\,\.\=\+\:\;]*$/;

                valid = regex.test(value);
            }

            return valid;
        },
    },
}