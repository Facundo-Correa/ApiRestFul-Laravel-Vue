<template>
  <div>
    <div class="footer_top">
      <div class="container">
        <div class="footer_top_inner">
          <div class="row">
            <div class="col-lg-5 col-md-6">
              <div class="widgets_container contact_us">
                <div class="footer_logo">
                  <a href="#">
                    <img src="assets/img/logo/ml-repuestos-logo.png" alt />
                  </a>
                  <p style="color: grey; padding:0;">Autoservicio mayorista de repuestos para motos.</p>
                </div>
                <div class="footer_contact">
                  <p>
                    <span>
                      <i class="fas fa-map-marked-alt"></i> Direccion:
                    </span> Pinto 3545, Capital Federal, Argentina
                  </p>
                  <p>
                    <span>
                      <i class="fa fa-phone"></i> Telefono:
                    </span> {{ $V_TELEFONO }}
                  </p>
                  <p>
                    <span>
                      <a href="https://wa.link/lktwif" target="_blank">
                        <i class="fa fa-whatsapp"></i> WhatsApp:
                      </a>
                    </span> {{ $V_WHATSAPP }}
                  </p>
                  <p>
                    <span>
                      <i class="fas fa-fax"></i> Fax:
                    </span> {{ $V_FAX }}
                  </p>
                  <p>
                    <span>
                      <i class="fas fa-envelope"></i> Email:
                    </span> ventas@mlrepuestos.com.ar
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="widgets_container widget_menu">
                <h3>Accesos Rápidos</h3>
                <div class="footer_menu">
                  <ul v-if="!isLoggedIn">
                    <li>
                      <a href="#quevendemos">QUE VENDEMOS</a>
                    </li>
                    <li>
                      <a href="#servicios">SERVICIOS</a>
                    </li>
                    <li>
                      <a href="#empresa">NUESTRA HISTORIA</a>
                    </li>
                    <li>
                      <router-link :to="{name: 'consultas'}">CONSULTAS</router-link>
                    </li>
                    <li>
                      <router-link :to="{name: 'preguntasfrecuentes'}">PREGUNTAS FRECUENTES</router-link>
                    </li>
                    <li>
                      <router-link :to="{name: 'tycpage'}">CONDICIONES GENERALES</router-link>
                    </li>
                    <li>
                      <router-link :to="{name: 'devolucionesygarantias'}">DEVOLUCIONES Y GARANTIAS</router-link>
                    </li>
                  </ul>
                  <ul v-if="isLoggedIn">
                    <li>
                      <router-link :to="{name: 'productos', params: {search: 'nuevos'}}">PRODUCTOS</router-link>
                    </li>
                    <li>
                      <router-link :to="{name: 'ofertas'}">OFERTAS</router-link>
                    </li>
                    <li>
                    <a href="#" @click.prevent="iframe = 'https://pedidos.mlrepuestos.com.ar:2083/Login.aspx'" title="Acceda a su Cta. Cte.">CUENTA CORRIENTE</a>
                    </li>
                    <li>
                      <router-link :to="{name: 'preguntasfrecuentes'}">PREGUNTAS FRECUENTES</router-link>
                    </li>
                    <li>
                      <router-link :to="{name: 'tycpage'}">CONDICIONES GENERALES</router-link>
                    </li>
                    <li>
                      <router-link :to="{name: 'devolucionesygarantias'}">DEVOLUCIONES Y GARANTIAS</router-link>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-3">
              <div class="widgets_container newsletter">
                <div class="row">
                  <div class="col-12">
                    <div class="row">

                      <div class="col-12 col-lg-12 webapp-link">
                        <h4>Descarga nuestra nueva App Android</h4>
                        <a href="https://play.google.com/store/apps/details?id=com.trememote.mlrepuestosapp" target="_blank">
                          <img class="qr-img" src="assets/img/qrcode_mlrepuestos.png" alt="Descargar App" />
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 pt-4">
                    <div class="subscribe_form" v-if="!isLoggedIn">
                      <h3>Subscribite a nuestro Newsletter</h3>
                      <div class="mc-form guest_form footer-newsletter">
                        <input
                                v-model="mail"
                                type="email"
                                autocomplete="off"
                                placeholder="Ingresá tu Email"
                        />
                        <button @click="addGuest">Subscribite!</button>
                      </div>
                      <p v-if="res_guest" class="res-guest">{{res_guest}}</p>
                    </div>
                    <div class="subscribe_form_user" v-if="isLoggedIn && getUser.persona.newsletter_mail !== 1">
                      <h3 class="mb-2">Subscribite a nuestro Newsletter</h3>
                      <button @click="addNewsletterUser">Subscribite!</button>
                      <p v-if="res_guest" class="res-guest">{{res_guest}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <modal-cuenta-corriente :item="iframe" v-if="iframe" @close="iframe = null" />
    </div>
  </div>
</template>

<script>
    import { mapGetters } from "vuex";

    export default {
        data() {
            return {
                cantidad: 4,
                mail: null,
                res_guest: null,
                iframe: null,
            };
        },
        computed: {
            ...mapGetters(["isLoggedIn","getUser"])
        },
        mounted() {
            //console.log(process.env.APP_NAME);
        },
        props: [],
        methods: {
            addGuest(){
                axios.post('api/newsletters/guest/add/'+this.mail)
                    .then(res=>{
                        this.res_guest = res.data.data;
                        this.mail = null;
                    })
                    .catch(err=>console.log(err))
            },
            addNewsletterUser(){
                axios.put('api/newsletters/user/add/'+this.getUser.persona.id)
                    .then(res=>{
                        this.res_guest = res.data.data;
                    })
                    .catch(err=>console.log(err))
            }
        }
    };
</script>

<style scoped lang="scss">
.qr-img {
  width: 33%;
  text-align: center;
}

.guest_form{
  position: relative;
  width: 350px;
  background: #ffffff;
  border-radius: 5px;
  border: 1px solid #ebebeb;

  & input{
    width: 100%;
    height: 48px;
    color: #888;
    font-size: 13px;
    background: none;
    border: 0;
    padding: 0 120px 0 15px;

  }
  & button{
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    font-size: 12px;
    color: white;
    background:  #1595c3;
    font-weight: 500;
    padding: 0 18px;
    border: 0;
    text-transform: uppercase;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    &:hover{
      background: #242424;
    }
  }
}

.subscribe_form_user{
  button{
    background-color: #1595c3;
    color: white;
    font-weight: 500;
    padding: 5px 18px;
    text-transform: uppercase;
    border: 0;
    border-radius: 3px;
    font-size: 12px;
  }
  p{
    color: #1b1e21;
  }
}

.res-guest{
  margin-top: 10px;
  color: #1595c3 !important;
}

.webapp-link {
  text-align: center;
  padding: 20px 30px 0px 0px;

  a {
    font-size: 20px;
    color: #1595c3;
  }

}
</style>
