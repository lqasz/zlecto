<template>
    <form id="registerForm" method="post" @submit.prevent="validateBeforeSubmit">
        <div :class="{'form-group' : true , 'has-danger': errors.has('first_name') }">
            <input type="text" class="form-control form-control-danger" placeholder="Podaj Imię" name="first_name" v-model="registerData.first_name" v-validate data-vv-rules="required|min:3">
        </div>
        <div :class="{'form-group' : true , 'has-danger': errors.has('last_name') }">
            <input type="text" class="form-control form-control-danger" placeholder="Podaj nazwisko" name="last_name" v-model="registerData.last_name" v-validate data-vv-rules="required|min:2">
        </div>
        <div :class="{'form-group' : true , 'has-danger': errors.has('email') }">
            <input type="email" class="form-control form-control-danger" placeholder="Podaj email" name="email" v-model="registerData.email" v-validate data-vv-rules="required|email">
        </div>
        <div :class="{'form-group' : true , 'has-danger': errors.has('phone_number') }">
            <input type="text" class="form-control form-control-danger" placeholder="Podaj numer telefonu" name="phone_number" v-model="registerData.phone_number" v-validate data-vv-rules="required|max:15">
        </div>
        <div :class="{'form-group' : true , 'has-danger': errors.has('password') }">
            <input type="password" class="form-control form-control-danger" placeholder="Podaj hasło" name="password" id="password" v-model="registerData.password" v-validate data-vv-rules="required|min:8|confirmed">
        </div>
        <div :class="{'form-group' : true , 'has-danger': errors.has('password_confirmation') }">
            <input type="password" class="form-control form-control-danger" placeholder="Powtórz hasło" name="password_confirmation" v-model="registerData.password_confirmation" v-validate>
        </div>
        <button class="btn btn-login btn-full">Register</button>
    </form>
</template>

<script type="text/babel">
    import Auth from '../../services/auth'

    export default {
        data() {
            return {
                registerData: {}
            }
        },
        methods: {
            validateBeforeSubmit(e){
                this.$validator.validateAll();

                if (!this.errors.any()) {
                    Auth.register(this.registerData).then(() => {
                        // this.$router.push('/login')
                    })
                }
            }
        },
    }
</script>