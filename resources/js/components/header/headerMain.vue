<template>
  <div>
    <!-- INICIO MODO CELULAR -->
    <div class="Offcanvas_menu">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="canvas_open">
              <a href="javascript:void(0)">
                <i class="ion-navicon"></i>
              </a>
            </div>
            <div class="Offcanvas_menu_wrapper">
              <div class="canvas_close">
                <a href="javascript:void(0)">
                  <i class="ion-android-close"></i>
                </a>
              </div>
              <div class="support_info">
                <p>
                  <i class="fa fa-whatsapp"></i> WhatsApp:
                  <a href="https://wa.link/lktwif" target="_blank">{{ $V_WHATSAPP }}</a>
                </p>
              </div>
              <div class="top_right text-right">
                <ul>
                  <template v-if="isLoggedIn">
                    <li>
                      <router-link to="/carrito" class="nav-link canvas_close_links">Mi carrito</router-link>
                    </li>
                    <li>
                      <a @click="logOut" class="nav-link canvas_close_links">Salir</a>
                    </li>
                  </template>
                  <template v-else>
                    <li class="nav-item">
                      <router-link :to="{name:'login'}" class="nav-link canvas_close_links">Ingresar</router-link>
                    </li>
                    <li class="nav-item">
                      <router-link :to="{name:'register'}" class="nav-link canvas_close_links">Registrarme</router-link>
                    </li>
                  </template>
                </ul>
              </div>
              <!-- DESPLEGABLES -->
              <div class="middel_right_info" v-if="isLoggedIn">
                <!-------------------------- FAVORITOS -------------------------->
                <div class="header_wishlist favoritos" id="favoritosIcon">
                  <a>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                  </a>
                  <span class="wishlist_quantity" v-if="!favoritosLoading">{{favoritos.total}}</span>

                  <div class="mini_cart">
                    <div class="cart_item" v-if="favoritosLoading || favoritos.total < 1">
                      <p>No posee elementos en Favoritos.</p>
                    </div>
                    <template v-else class="mini_cart">
                      <div class="cart_item" v-for="item of favoritos.data" :key="item.id">
                        <div class="cart_img" v-if="item.image_thumb">
                          <img :src="item.image_thumb" />
                        </div>
                        <div class="cart_img" v-else>
                          <b class="label-combo">Combo</b>
                        </div>

                        <div class="cart_info">
                          <a>{{item.nombre}}</a>
                          <p>
                            <span>${{item.precio.toFixed(2)}}</span>
                          </p>
                          <button
                            class="btn btn-sm btn-outline-primary rounded-circle"
                            @click="toBasket(item.id, item.is_combo)"
                          >
                            <i class="fa fa-shopping-cart"></i>
                          </button>
                        </div>
                        <div class="cart_remove">
                          <a @click="remove(item.id, item.is_combo)">
                            <i class="ion-android-close"></i>
                          </a>
                        </div>
                      </div>
                    </template>
                  </div>
                </div>
                <!-------------------------- PRESUPUESTOS -------------------------->
                <div class="header_wishlist presupuestos" id="wishlistIcon">
                  <a>
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                  </a>
                  <span class="wishlist_quantity" v-if="!wishlistLoading">{{wishlist.total}}</span>

                  <div class="mini_cart">
                    <div class="cart_item" v-if="wishlistLoading || wishlist.total < 1">
                      <p>No posee elementos en Presupuestos.</p>
                    </div>
                    <template v-else class="mini_cart">
                      <div class="cart_item" v-for="item of wishlist.data" :key="item.id">
                        <div class="cart_img" v-if="item.image_thumb">
                          <img :src="item.image_thumb" />
                        </div>
                        <div class="cart_img" v-else>
                          <b class="label-combo">Combo</b>
                        </div>
                        <div class="cart_info">
                          <a>{{item.nombre}}</a>
                          <p>
                            <span>${{item.precio.toFixed(2)}}</span>
                          </p>
                        </div>
                        <div class="cart_remove">
                          <a @click="remove(item.id, item.is_combo)">
                            <i class="ion-android-close"></i>
                          </a>
                        </div>
                      </div>
                      <div>
                        <router-link :to="{name:'Presupuesto'}">
                          <button class="btn btn-primary">Siguiente</button>
                        </router-link>
                      </div>
                      <Presupuesto v-if="showPresupuestoCelular" 
                      :showPresupuestoCelular = showPresupuestoCelular
                      @close="cerrarPresupuestoCelular"/>
                    </template>
                  </div>
                </div>
                <!-------------------------- CARRITO -------------------------->
                <div class="mini_cart_wrapper">
                  <a href="javascript:void(0)">
                    <i class="fa fa-shopping-cart"></i>
                    ${{(subtotalBasket*1.21).toFixed(2)}}
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <span class="cart_quantity">{{userBasket.total}}</span>

                  <!--mini cart-->
                  <div class="mini_cart">
                    <!-- Productos -->
                    <basket-prod v-for="item of basketProductos" :key="item.id" :item="item" />

                    <!-- Combos -->
                    <basket-comb v-for="item of basketCombos" :key="item.id" :item="item" />

                    <div class="mini_cart_table">
                      <div class="cart_total">
                        <span>Sub total:</span>
                        <span class="price">${{subtotalBasket}}</span>
                      </div>
                      <div class="cart_total mt-10">
                        <span>Iva:</span>
                        <span class="price">${{(subtotalBasket*0.21).toFixed(2)}}</span>
                      </div>
                      <div class="cart_total mt-10">
                        <span>Total:</span>
                        <span class="price">${{(subtotalBasket*1.21).toFixed(2)}}</span>
                      </div>
                    </div>

                    <div class="mini_cart_footer">
                      <div class="cart_button">
                        <router-link :to="{name:'basket'}">Comprar</router-link>
                      </div>
                    </div>
                  </div>
                  <!--mini cart end-->
                </div>
              </div>
              <div id="menu" class="text-left">
                  <ul class="offcanvas_main_menu">
                    <li class="menu-item-has-children active">
                      <router-link
                              :to="{name:'productos',params:{search:'nuevos'}}"
                              class="nav-link canvas_close_links"
                      >Productos</router-link>
                    </li>
                    <li class="menu-item-has-children active">
                      <router-link :to="{name:'ofertas'}" class="nav-link canvas_close_links">Ofertas</router-link>
                    </li>
                    <li class="menu-item-has-children active">
                      <router-link :to="{name:'consultas'}" class="nav-link canvas_close_links">Consultas</router-link>
                    </li>
                    <li class="menu-item-has-children active">
                      <router-link :to="{name:'MiCuentaPerfil'}" class="nav-link canvas_close_links">Mi Perfil</router-link>
                    </li>
                  </ul>
              </div>
              <div class="Offcanvas_footer">
                <span>
                  <a href="#">
                    <i class="fa fa-envelope-o"></i> ventas@mlrepuestos.com.ar
                  </a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- FIN MODO CELULAR -->

<!-- INICIO MODO WEB -->
    <div class="main_header">
      <!--header top start-->
      <div class="header_top">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-3">
              <div class="support_info">
                <p>
                  <i class="fa fa-whatsapp"></i> WhatsApp:
                  <a href="https://wa.link/lktwif" target="_blank">{{ $V_WHATSAPP }}</a>
                </p>
              </div>
            </div>
            <div class="col-md-9">
              <div class="top_right text-right">
                <ul>
                  <template v-if="isLoggedIn">
                    <li class="nav-item">
                      <p>Bienvenido: {{getUser.name}} (Cliente: <b>{{getUser.persona.n_plataforma}}</b>)</p>
                    </li>
                    <li class="nav-item">
                      <p>Puntos: {{puntosUsuario}}</p>
                    </li>
                    <li class="nav-item" v-if="dolar">
                      <p>Dolar: ${{dolar}}</p>
                    </li>
                    <li>
                      <!-- menu mi cuenta -->
                      <vue-dropd :opciones="micuenta" @change="dropdownPush">
                      </vue-dropd>
                    </li>
                    <li class="nav-item">
                      <a @click="logOut" class="nav-link">Salir</a>
                    </li>
                    <li>
                      <div class="middel_right_info">
                        <!-- Favoritos, Presupuestos y Basket desplegables -->
                        <favoritos />
                        <wishlist />
                        <basket />
                      </div>
                    </li>
                  </template>
                  <template v-else>
                    <li class="nav-item">
                      <router-link :to="{name:'login'}" class="nav-link">Ingresar</router-link>
                    </li>
                    <li class="nav-item">
                      <router-link :to="{name:'register'}" class="nav-link">Registrarme</router-link>
                    </li>
                  </template>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--header top start-->

      <!--header middel start-->
      <div class="header_middle middle_two">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-logo-nav">
              <div class="logo">
                <router-link :to="{name:'home'}" replace class="nav-link">
                  <img src="assets/img/logo/ml-repuestos-logo.png" alt />
                </router-link>
              </div>
            </div>
            <div class="col-menu-nav">
              <div class="main_menu menu_two menu_position text-right">
                <nav id="mainnav">
                  <ul v-if="!isLoggedIn">
                    <li class="mega_items">
                      <a href="#quevendemos" class="nav-link">Que Vendemos</a>
                    </li>
                    <li class="mega_items">
                      <a href="#servicios" class="nav-link">Servicios</a>
                    </li>
                    <li class="mega_items">
                      <a href="#empresa" class="nav-link">Historia</a>
                    </li>
                    <li class="mega_items">
                      <router-link :to="{name:'consultas'}" class="nav-link">Consultas</router-link>
                    </li>
                    <li class="mega_items">
                      <a class="select-ayuda nav-link mr-3">
                        <vue-dropd :opciones="ayuda" @change="ayudaPush"></vue-dropd>
                      </a>
                    </li>
                  </ul>
                  <ul v-if="isLoggedIn">
                    <li class="mega_items">
                      <router-link :to="{name:'productos',params:{search:'nuevos'}}"
                                   class="nav-link">Productos
                      </router-link>
                    </li>
                    <li class="mega_items" @click="reload">
                      <router-link :to="{name:'ofertas'}" class="nav-link">Ofertas</router-link>
                    </li>
                    <li class="mega_items">
                      <a href="https://pedidos.mlrepuestos.com.ar:2083/Login.aspx" target="_blank" rel="nofollow" title="Acceda a su Cta. Cte.">Cuenta Corriente</a>
                    </li>
                    <li class="mega_items">
                      <a class="select-ayuda nav-link mr-3">
                        <vue-dropd :opciones="ayuda" @change="dropdownPush"></vue-dropd>
                      </a>
                    </li>
                    <li class="mega_items" v-if="getUser.role === 'admin_admin'">
                      <a class="select-ayuda nav-link mr-3">
                        <vue-dropd :opciones="backoffice" @change="dropdownPush"></vue-dropd>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--header middel end-->

      <modal-cuenta-corriente :item="iframe" v-if="iframe"/>
      <Presupuesto v-if="showPresupuesto"
      :showPresupuesto = showPresupuesto
      @close = "cerrarPresupuesto"
      />
      <MiPerfil v-if="showPerfil"/>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import '../../plugins/smoothScrolling.js';
import '../../plugins/offset.js';
import Presupuesto from "../modals/presupuesto.vue";
import misCompras from "../modals/misCompras.vue";
import MiPerfil from "../modals/miPerfil.vue";

export default {
    data() {
        return {
            showPresupuestoCelular: false,
            showPresupuesto: false,
            showPerfil: false,
            dolar: null,
            iframe: null,
            micuenta: [
                {
                    label: "Mi Cuenta"
                },
                {
                    opciones: [
                        {
                            value: "Mis Compras",
                            link: "MiCuentaCompras"
                        },
                        {
                            value: "Mis Presupuestos",
                            link: "MiCuentaPresupuestos"
                        },
                        {
                            value: "Mi Perfil",
                            link: "MiCuentaPerfil"
                        }
                    ]
                }
            ],
            ayuda: [
                { label: "Ayudas" },
                { opciones: [
                        {
                            value: "Preguntas Frecuentes",
                            link: "preguntasfrecuentes"
                        },
                        {
                            value: "Condiciones Generales",
                            link: "tycpage"
                        },
                        {
                            value: "Devoluciones y Garantías",
                            link: "devolucionesygarantias"
                        }
                    ]
                }
            ],
            /*Já te encontré*/
            backoffice: [{ label: "Administrador" }, { opciones: [
                        {
                            value: "Clientes",
                            link: "clientes"
                        },
                        {
                            value: "Ofertas",
                            link: "admofertas"
                        },
                        {
                            value: "Herramientas",
                            link: "herramientas"
                        },
                        {
                            value: "Consulta Tecnica",
                            link: "ctecnica"
                        },
                        {
                            value: "Relacionador de Articulos",
                            link: "artrel"
                        },
                        {
                            value: "Comprobantes de pago",
                            link: "comprobantes"
                        }
                    ]
                }
            ],
            currentURL: null,
        };
    },
    computed: {
        ...mapGetters(["auth", "isLoggedIn", "getUser", "puntosUsuario", "basketProductos", "basketCombos", "userBasket", "wishlist", "wishlistLoading", "favoritos", "favoritosLoading"]),
        subtotalBasket() {
            let total = 0;
            // sumarizo los productos
            if (this.basketProductos.length) {
                total += this.basketProductos.reduce((a, b) => {
                    return a + b.precio * b.umq * b.cantidad;
                }, 0);
            }
            // sumarizo los combos
            if (this.basketCombos.length) {
                total += this.basketCombos.reduce((a, b) => {
                    return a + b.precio * b.cantidad;
                }, 0);
            }
            return total.toFixed(2);
        }
    },
    watch: {
        "$route"(to, from) {
            this.initButtons();
        }
    },
    mounted() {
        this.getDolar();
        this.currentURL = window.location.pathname;
        this.smoothScrolling({
            url: [
                "/",
                "/home"
            ],
            urlMaxLenght: 20,
            offset: -30,
            selector: $("#mainnav .mega_items a")
        });
        this.initButtons();
    },
    methods: {
        ...mapActions(["getWishlist", "removeFromWishlist", "modifyBasket","getFavoritos", "removeFromFavoritos"]),
        reload() {
            location.reload();
        },
        cerrarPresupuestoCelular(){
          this.showPresupuestoCelular = false;
          this.$router.push({name:'productos',params:{search:'nuevos'}});
        },
        cerrarPresupuesto(){
          this.showPresupuesto = false;
        },
        toBasket(id, is_combo) {
            this.modifyBasket([
              { id: id, quantity: 1, is_combo: is_combo, usa_puntos: false }
            ]).then(
              this.removeFromFavoritos({ id: id, is_combo: is_combo }),
              this.$noty.success("Producto agregado a su carrito!")
              )
          },
        smoothScrolling(opt) {
            if (!opt.url)
                opt.url = "/home";
            if (!opt.urlMaxLenght)
                opt.urlMaxLenght = 20;
            if (!opt.offset)
                opt.offset = 0;
            if (opt.selector) {
                opt.url.forEach(function (a) {
                    if (window.location.pathname == a) {
                        opt.selector.click(function (e) {
                            if ($(this).attr("href").length < 20) {
                                e.preventDefault();
                                $("html,body").animate({ scrollTop: $($(this).attr("href")).offset().top - opt.offset }, "slow");
                            }
                        });
                    }
                });
            }
            else {
                //console.log('## fma.smoothScrolling ## selector is not defined!')
            }
        },
        dropdownPush(res) {
            this.$router.push({ name: res.link });
        },
        ...mapActions(["logout", "getBasket", "clearBasket"]),
        logOut() {
            this.logout().then(() => {
                // Para evitar error de VUE en caso de ya
                // estar en la ruta HOME se agrega el callback de onAbort al router.push
                this.$router.push({ name: "home" }, undefined, () => {
                    this.$router.go();
                });
            });
        },
        getDolar() {
            axios.get("api/dolar/valor")
                .then(res => {
                this.dolar = res.data.data;
            })
                .catch(err => console.log(err));
        },
        initButtons() {
            let buttons = document.querySelectorAll(".canvas_close_links");
            buttons.forEach(x => {
                x.addEventListener("click", () => {
                    document.querySelector(".canvas_close a").click();
                });
            });
            $(".mini_cart_wrapper > a").on("click", function (event) {
                if ($(window).width() < 768) {
                    $(".mini_cart_wrapper .mini_cart").slideToggle("medium");
                    $(".presupuestos .mini_cart").slideUp("medium");
                    $(".favoritos .mini_cart").slideUp("medium");
                }
            });
            $(".presupuestos > a").on("click", function (event) {
                if ($(window).width() < 768) {
                    $(".presupuestos .mini_cart").slideToggle("medium");
                    $(".favoritos .mini_cart").slideUp("medium");
                    $(".mini_cart_wrapper .mini_cart").slideUp("medium");
                }
            });
            $(".favoritos > a").on("click", function (event) {
                if ($(window).width() < 768) {
                    $(".favoritos .mini_cart").slideToggle("medium");
                    $(".presupuestos .mini_cart").slideUp("medium");
                    $(".mini_cart_wrapper .mini_cart").slideUp("medium");
                }
            });
        },
    },
    components: { Presupuesto, misCompras, MiPerfil }
};
</script>

<style scoped lang="scss">
#wishlistIcon:hover .mini_cart {
  max-height: 500px;
  padding: 18px 28px 33px;
  visibility: visible;
  overflow: scroll;
  transform: translateX(100px);
}

#favoritosIcon:hover .mini_cart {
  max-height: 500px;
  padding: 18px 28px 33px;
  visibility: visible;
  overflow: scroll;
  transform: translateX(150px);
}

.mini_cart {
  overflow: auto;
}
.cart_img:hover,
.cart_img {
  border: none !important;
  text-align: center;
}
.label-combo {
  background: #b70ace;
  border-radius: 1rem;
  color: #fff;
  padding: 5px 8px;
  font-size: 11px;
}

.search_container form {
  width: 446px;
}

.select-ayuda{

  .sel-ayuda {
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 600;
    border: 2px solid red;

    &:hover{
      color: #242424;
    }
  }

}

.select_option_2 {
  display: flex;
  align-items: center;
  width: 100%;
  margin-right: 15px;
}

.col-lg-5 {
  display: flex;
}

@media (min-width: 768px) {
  .col-logo-nav{
    width: 15%;
  }
  .col-menu-nav{
    width: 85%;
  }
}
@media (min-width: 992px) and (max-width: 1199px) {
  .col-menu-nav{
    .mega_items{
      margin-right: 22px;
    }
  }
}
</style>
