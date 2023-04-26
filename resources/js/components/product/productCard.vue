<template>
  <div
    v-bind:class="
      classChange ? 'col-lg-4 col-md-4 col-12' : 'col-lg-3 col-md-3 col-12'
    "
  >
    <article class="single_product">
      <figure>
        <div class="product_thumb mb-4 w-100">
          <a class="primary_img">
            <img :src="producto.image_thumb" />
          </a>
          <div class="label_product" v-if="producto.is_promo">
            <span class="label_sale" :class="'label_promo'">Oferta</span>
          </div>

          <div class="action_links">
            <ul>
              <li class="favoritos">
                <a @click="toFavoritos(producto.id)" title="Agregar a Favoritos">
                  <i class="fa fa-heart-o" aria-hidden="true"></i>
                </a>
              </li>
              <!-- wishlist ahora son los presupuestos -->
              <li class="wishlist">
                <a @click="toWishlist(producto.id)" title="Agregar a Presupuestos">
                  <i class="fa fa-file-text" aria-hidden="true"></i>
                </a>
              </li>
              <li class="compare">
                <a @click="showModalCalc = true" title="Calcular">
                  <i class="fa fa-calculator"></i>
                </a>
              </li>

              <li class="quick_button" v-if="!producto.is_promo">
                <a @click="showModal = true" title="Detalles">
                  <span class="ion-ios-search-strong"></span>
                </a>
              </li>

              <li class="quick_button" v-if="producto.is_promo">
                <a
                  @click="showOffer = true"
                  title="Detalles"
                >
                  <span class="ion-ios-search-strong"></span>
                </a>
              </li>

              <li class="quick_button" >
                <a  @click.prevent="toBasket" title="Agregar al carrito">
                  <i class="fa fa-shopping-cart"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="product_content grid_content">
          <b>{{ producto.id }}</b>
          <h3 class="product_name grid_name">
            <a href="#">{{ producto.nombre }}</a>
          </h3>
          <div class="semaforo">
            <span :style="{ 'background-color': status.color }"></span>
            {{ status.txt }}
          </div>
          <h5>{{ producto.origen.origen }}</h5>
          <h5>{{ presentacion }}</h5>
          <div class="price_box">
            <span class="current_price">
              ${{ producto.precio_actual.toFixed(2) }}
              {{ abreviatura }}</span
            >
          </div>
          <div>{{ total }}</div>
          <div v-if="producto.puntos" class="puntos">
            o canjea por ${{ producto.puntos_price.toFixed(2) }} +
            {{ producto.puntos }} Puntos!
          </div>
        </div>
      </figure>
    </article>
    <!-- modal de producto -->
    <productModal
      v-if="showModal"
      @close="go"
      :producto="producto"
      :showModal="showModal"
    />

    <!--|| Me gustaria entender por que no se muestra ||-->

    <modal-oferta-producto-vue
      v-if="showOffer"
      :item="productoOffer"
      @close="showOffer = false;">
    </modal-oferta-producto-vue>

    <!-- if show offer == true ? modalOfertas-->

    <productCalcModal
      v-if="showModalCalc"
      @close="showModalCalc = false"
      :producto="producto"
    />
  </div>
</template>

<script>
import { mapActions } from "vuex";
import productMixin from "../../mixins/productMixin";
import modalOfertas from "../../pages/index/modalOfertas.vue";
import modalOfertaProductoVue from '../index/modales/modalOfertaProducto.vue';

export default {
  components: {
    modalOfertas,
    modalOfertaProductoVue
  },
  name: "productCard",
  data() {
    return {
      showModal: false,
      showOffer: false,
      showModalCalc: false,
      showModalRelated: false,
      productoOffer: [],
      processing: false,
      showalert:false
    };
  },
  props: ["classChange"],
  mixins: [productMixin],
  methods: {
    ...mapActions(["addToWishlist", "removeFromWishlist", "modifyBasket","addToFavoritos", "removeFromFavoritos"]),
    toWishlist(id) {
      this.addToWishlist({ id: id, is_combo: false, cantidad: 1}).then((res) =>
        this.$noty.success(res)
      );
    },
    toFavoritos(id) {
      this.addToFavoritos({ id: id, is_combo: false, cantidad: 1})
      .then((res) =>
        this.$noty.success(res)
      );
    },
    toBasket() {
      if (this.processing === true) {
        if(this.showalert == false){

          this.$noty.warning("Aguarde un momento por favor", {
            layout: "top",
            timeout: 3000,
          });
          // || Hay que hacer una corrección, si es oferta no se abre el modal de productos, se abre el de ofertas.
          if(this.producto.is_promo){
            this.showOffer = true;
            //console.log(this.is_promo);
          }
          else {
            this.showModal= true;
            //console.log(this.is_promo);
          }
          return;
        }
      }
      this.processing = true;

      if (this.status.color == "red") {
        this.$emit("openRelatedModal", { id: this.producto.id });
      }
      this.modifyBasket([
        {
          id: this.producto.id,
          quantity: 1,
          is_combo: false,
          is_oferta: this.producto.is_promo,
          usa_puntos: false,
        },
      ])
        .then((res) => {
          //console.log(res.data.data.status);
          switch (res.data.data.status) {
            case 205:

              this.$noty.warning(res.data.data.data, {
                layout: "topCenter",
                timeout: 9000,
              });
              break;
            default:
              this.$noty.success(res.data.data.data);

              break;
          }
          setTimeout(() => {
            // on success or failure
            // reset the state
            this.processing = false;
          }, 3000);
        })
        .catch((err) => {

          var msg =
            "Este producto ya lo agrego a su lista de alerta de stock." +
            " Le recordamos que los productos sin stock o por pedido solo se pueden agregar una vez y se" +
            " notificara por mail cuando estos ingresen al stock. GRACAIS!!!";

          if (err.response.data.message.includes("1062") == false)
            msg = err.message;

          //console.log(err.response);
          this.$noty.error(msg, {
            timeout: 4000,
            layout: "topCenter",
          });

        });
    },
    close() {
      //console.log("salgo por aca");
      this.showModalRelated = false;
      this.classChange = false;
      this.showalert = false;
    },
    closeOfferModal () {
      // logic
      //console.log("ASDASD0");
    },
    open() {
      // || Necesario al escanear codigo de barras || //
      var currentUrl = window.location.pathname;
      if (currentUrl.includes("detalle")) {
        this.showModal = true;
      }

      //console.log(currentUrl);
    },
    go(){
      this.showModal = false;
    }
    // go(){
    //   this.showModal = false;
    //   this.$router.push({name:'home'})
    //   .then(setTimeout(() => {
    //     this.$router.push({name: 'productos',params:{search:'nuevos'}})
    //   },0))
    // }
  }, //<- terminan los methods
  mounted: function() {
    if (this.producto.is_promo) {
      axios
        .post("/api/ofertas/getOfertaByProdID", { id: this.producto.id })
        .then((response) => {
          //console.log("ID: ", this.producto.id);
          //console.log("RESPUESTA: ", response);
          this.productoOffer = response.data.data;
        });
    }
  }
}
</script>

<style scoped lang="scss">
.semaforo span {
  border-radius: 50%;
  width: 10px;
  height: 10px;
  margin: 0 10px;
  display: inline-block;
  vertical-align: middle;
}

.puntos {
  color: green;
  font-weight: 600;
}

.label_sale.label_nuevo {
  background: #1b4b72;
}

.label_sale.label_oferta {
  background: #07ac40;
}

.label_sale.label_combo {
  background: #b70ace;
}

.label_sale.label_promo {
  background: #da4604;
}

.action_links {
  // top: 80px; <- original
  top: -32px;
  left: -17px;

  ul li {
    margin-left: 5px;
    float: left;
  }
}
.action_links ul{
  display: flex;
  flex-direction: column;
}
.primary_img img {
  margin: auto;
  max-height: 100px;
  display: block;
}
</style>
