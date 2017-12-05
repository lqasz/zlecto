export default {
  data: function() {
    var token = document.head.querySelector('meta[name="csrf-token"]');

    return {
      csrf: token.content,
      inputValues: {
        name: "", surname: "",
        email: "", telephone: "",
        password1: "", password2: "",
      }
    }
  },

  methods: {
    registerUser() {
      axios.post('v1/rejestracja', {
        'imie': "Jan",
        'nazwisko': "Kowalski",
        'email': "jan.kowalski@test121.pl",
        'nr_telefonu': "566 665 544",
        'haslo': "test1234",
        'ponownie_haslo': "test1234",
      }).then((res) => {
        console.info(res);
      });
    },
  },
}
