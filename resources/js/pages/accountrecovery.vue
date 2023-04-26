<template>
    <div class="customer_login mt-60">
        <div class="container ">
            <div class="row justify-content-center ">
                <!--recovery area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form modlog">
                        <h2>Recupero de clave</h2>
                        <form @submit.prevent="accountRecovery" action method="post" id="formRecovery">
                            <div class="form-group">
                                <label>Email Registrado <span>*</span></label>
                                <input
                                  v-model="user.email"
                                  type="text"
                                  class="form-control span12"
                                  id="email"
                                  name="email"
                                  placeholder="Ingrese su email"
                                />
                            </div>
                            <div class="form-group">
                                <label>Nueva Contraseña <span>*</span></label>
                                <input
                                  v-model="user.password"
                                  type="password"
                                  class="form-control span12"
                                  id="pass"
                                  name="pass"
                                  placeholder="Ingrese su nueva clave"
                                />
                            </div>

                            <div lass="form-group">
                              <button type="submit" class="btn btn-primary">Modificar Contraseña</button>
                            </div>

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
                user: {
                    email:null,
                    password:null,

                },
            }
        },
        mounted() {
        },
        methods: {
          accountRecovery() {
            axios
              .post("/api/accountrecovery", this.user)
              .then(res => {
                this.$noty.success(res.data.data);
                this.$router.push({ name: "login" });
              })
              .catch(err => {
                return this.showError(err);
              });
          }
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

    .recovery_submit{
        margin-bottom: 10px;
    }
</style>
