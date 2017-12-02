export default {
  data: function() {
    var token = document.head.querySelector('meta[name="csrf-token"]');

    return {
    csrf: token.content,
    Name: "",  errName: "",
    Surname: "",  errSurname: "",
    Email: "",  errEmail: "",
    Tele: "", errTele: "",
    Pass1: "", errPass1: "",
    Pass2: "",  errPass2: "",
    }
  },

    methods: {
    	edit: function(e) {

    		var $element = $(e.target);
    		var name = $element.attr("name");

    		if(name === "imie") {

          this.Name = ($element.val());
    			this.errName = "";

    			if($element.val().length < 3) this.errName= 'Imię powninno składać się z co najmniej 3 liter';

    			var regex = /^[^0-9\.\*\/\?\:\;\,\^\+\\\=\|!@#$%&()"'\-\_<>]*$/;

    			if(!regex.test(($element.val()))){
    				if(this.errName) this.errName += ' i nie może zawierać znaków specjalnych ani cyfr';
    				else this.errName = 'Imię nie może zawierać znaków specjalnych ani cyfr';
    			}
    		}

    		if(name === "nazwisko") {

          this.Surname = ($element.val());
          this.errSurname = "";

          if($element.val().length < 3) {
            this.errSurname = 'Nazwisko powninno składać się z co najmniej 3 liter';
          }

          var regex = /^[^0-9\.\*\/\?\:\;\,\^\+\\\=\|!@#$%&()"'\-\_<>]*$/;

          if(!regex.test(($element.val()))){
            if(this.errSurname) this.errSurname += ' i nie może zawierać znaków specjalnych ani cyfr';
            else this.errSurname = 'Nazwisko nie może zawierać znaków specjalnych ani cyfr';
          }
    		}

        if(name === "email") {

          this.Email = ($element.val());
          this.errEmail = "";
        }

        if(name === "nr_telefonu") {

          this.Tele = ($element.val());
          this.errTele = "";

          var regex = /^[^a-zA-Z\.\*\/\?\:\;\,\^\+\\\=\|!@#$%&()"'-\_<>]*$/;

          if(!regex.test(($element.val()))) this.errTele += 'Numer telefonu nie może zawierać innych znaków niż cyfry i spacji';
        }

        if(name === "haslo") {

          this.Pass1 = ($element.val());
          this.errPass1 = "";

          if($element.val().length < 8) {
            this.errPass1 = 'Hasło powninno składać się z co najmniej 8 znaków';
          }
        }

        if(name === "ponownie_haslo") {

          this.Pass2 = ($element.val());
          this.errPass2 = "";

          if(this.Pass2 !== this.Pass1) {
            this.errPass2 = 'Podane hasła nie są takie same';
          }
        }
      },
    },
}
