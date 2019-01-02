<template>
    <div class="login row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form @submit.prevent="authenticate">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" v-model="form.email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" v-model="form.password" name="password" class="form-control" id="password" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                        <div class="" v-if="authError">
                            <div  class="alert alert-danger" role="alert">
                                {{ authError }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { login } from "../../helpers/auth"
    export default {
        name: 'login',
        data(){
            return {
                form: {
                    email: "",
                    password: ""
                },
                error: null
            }
        },
        methods: {
          authenticate(){
            this.$store.dispatch("login")

            login(this.$data.form)
                .then((res) => {
                    this.$store.commit("loginSuccess", res)
                    this.$router.push({path: '/'})
                })
                .catch((error) => {
                    this.$store.commit("loginFailed", { error })
                })
          }  
        },
        computed: {
            authError(){
                return this.$store.getters.authError
            }
        }
    }
</script>
