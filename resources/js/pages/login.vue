<template>
    <div class="customer_login mt-60">
        <div class="container ">
            <div class="row justify-content-center ">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form modlog">
                        <h2>Login</h2>
                        <form @submit.prevent="logIn">
                            <p>
                                <label>Usuario o Email <span>*</span></label>
                                <input type="email" id="email" v-model="result.email">
                            </p>
                            <p>
                                <label>Contraseña <span>*</span></label>
                                <input type="password" v-model="result.password">
                            </p>

                            <div class="login_submit">
                                <button class="btn btn-primary btn-block">login</button>
                            </div>

                            <div class="login_submit">
                                <span>
                                    <router-link :to="{name:'accountrecovery'}">
                                        ¿Te olvidaste la contraseña? Recuperala
                                    </router-link>
                                </span>

                                <label for="remember">
                                    <input id="remember" type="checkbox">  Recordarme
                                </label>

                            </div>
                            <router-link class="btn btn-primary btn-block" :to="{name:'register'}" >
                                ¿No estás registrado? Registrate
                            </router-link>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                result: {
                    email:null,
                    password:null,
                }
            }
        },
        mounted() {
        },
        methods: {
            logIn() {
                if (!this.result.email || !this.result.password) {
                    this.$noty.error('Debe completar el formulario antes de enviar!');
                } else {

                    this.$store
                            .dispatch("login", this.result)
                            .then((e) => {
                              if(e.data.data.notificacion)
                                this.$noty.warning(e.data.data.notificacion)
                              this.$router.push('/productos/nuevos')
                            })
                            .catch(err => this.showError(err));

                }
            },
        },
    }
</script>

<style scoped lang="scss">
    .modlog{
        background-color: whitesmoke ;
        padding: 15px;
        border-radius: 10px;
    }
    .modreg{
        background-color:rgb(0, 99, 209);;
        color: white;
        text-align: center;
        margin: 40px 150px ;

        border-radius: 10px;
        font-size : 20px;


    }
    .modreg a{
        text-size: 20px;
    }

    .account_form button {
        margin-left: 0px;
    }

    .account_form label {
        margin-bottom:  0px;
        margin-top: 12px;
        font-size: 14px;
    }

    .account_form{

        form{
            background-color: white;

            input{
                background-color: whitesmoke;
            }
        }
    }

    .login_submit{
        margin-bottom: 10px;
    }
</style>
