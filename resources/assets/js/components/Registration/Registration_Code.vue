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
}
