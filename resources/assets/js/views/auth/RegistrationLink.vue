<template>
    <div class="main-content">
        {{message}} <br/><a href="/">Powrót do strony głównej!</a>
    </div>
</template>

<script type="text/babel">
    export default {
        data() {
            return {
                message: {}
            }
        },

        mounted: function() {
            var self = this;
            let token = this.$route.params.token;

            axios.get('/api/auth/register-user/'+token).then(response =>  {
                self.message = response.data.message;
            }).catch(error => {
                console.log('Error', error.message);
            });
        }
    }
</script>