<template>
  <vue-modal :size="'md'" @close="$emit('close')">
    <template slot="title"></template>
    <template slot="body">
      <div class="container">
        <div class="media-body row">
          <div class="col-sm-6">
            <img
              class="center-block"
              :alt="producto.nombre"
              :src="producto.image"
            />
          </div>

          <div class="col-sm-6">
            <div class="modal_description mb-15">
              <h4> {{producto.id}} : Descripción técnica</h4>            
              <p>{{ producto.descripcion }}</p>
            </div>
            <div class="modal_price mb-10">
              <span class="new_price"
                >${{ producto.precio_actual }} {{ abreviatura }}</span
              >
              <span class="old_price" v-if="producto.descuento > 0">
                ${{ (producto.precio_actual * producto.descuento) / 100 }}
              </span>

              <div>{{ total }}</div>
            </div>
            <div class="variants_selects">
              <div class="modal_add_to_cart">
                <input
                  min="0"
                  max="100"
                  step="1"
                  value="1"
                  type="number"
                  v-model="qtyCart"
                />
                <button @click="toBasket">Agregar al carrito</button>
              </div>
            </div>
          </div>
          <div class="whatsapp_product mb-15">
            <i class="fa fa-whatsapp"></i>

            <a
              v-if="isMobile"
              :href="
                'https://api.whatsapp.com/send?phone=541130607993&text=Hola%20soy%20' +
                this.nombre +
                ',%20nro.%20de%20plataforma:%20' +
                this.n_plataforma +
                '.%20Quiero%20realizar%20una%20consulta%20sobre%20' +
                producto.nombre +
                ''
              "
              target="_blank"
              >CONSULTAR POR ESTE PRODUCTO POR WHATSAPP</a
            >
            <a
              v-else
              :href="
                'https://web.whatsapp.com/send?phone=541130607993&text=Hola%20soy%20' +
                this.nombre +
                ',%20nro.%20de%20plataforma:%20' +
                this.n_plataforma +
                '.%20Quiero%20realizar%20una%20consulta%20sobre%20' +
                producto.nombre +
                ''
              "
              target="_blank"
              >CONSULTAR POR ESTE PRODUCTO POR WHATSAPP</a
            >
          </div>
        </div>
      </div>
    </template>
  </vue-modal>
</template>

<script>
import { mapActions } from "vuex";
import productMixin from "../../mixins/productMixin";
import mobileChecker from "../../mixins/mobileChecker";

export default {
  mixins: [productMixin, mobileChecker],
  mounted() {
    this.n_plataforma = this.$store.getters.getUser.persona.n_plataforma;
    this.nombre = this.$store.getters.getUser.persona.nombre + this.$store.getters.getUser.persona.apellido;
  },
  data() {
    return {
      qtyCart: 1,
      nombre: '',
      n_plataforma: ''
    };
  },
  methods: {
    ...mapActions(["modifyBasket"]),

    toBasket() {
      this.modifyBasket([
        {
          id: this.producto.id,
          quantity: this.qtyCart,
          is_combo: false,
          usa_puntos: false,
          is_oferta: this.producto.is_promo
        },
      ])
        .then((res) => {
          //console.log(res.data.data.status);
          switch (res.data.data.status) {
            case 205:
              this.$noty.warning(res.data.data.data, {
                layout: "center",
                timeout: 25000,
              });
              break;
            default:
              this.$noty.success(res.data.data.data);
              break;
          }
        })
        .catch((err) => {
          var msg =
            "Este producto ya lo agrego a su lista de alerta de stock." +
            " Le recordamos que los productos sin stock o por pedido solo se pueden agregar una vez y se" +
            " notificara por mail cuando estos ingresen al stock. GRACAIS!!";

       /*   if (err.response.data.message.includes("1062") == false)
            msg = err.message;
*/
          this.$noty.error(msg, {
            timeout: 25000,
            layout: "topCenter",
          });
        });
    },
  },
};
</script>

<style scoped lang="scss">
.semaforo {
  margin-bottom: 5px;
  span {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    margin: 0 10px;
    display: inline-block;
    vertical-align: middle;
  }
}

.puntos {
  color: green;
  font-weight: 600;
}

.label_sale {
  .label_nuevo {
    background: #1b4b72;
  }

  .label_oferta {
    background: #07ac40;
  }

  .label_combo {
    background: #b70ace;
  }

  .label_promo {
    background: #da4604;
  }
}

.row.small-gutters {
  margin-right: -5px;
  margin-left: -5px;

  [class^="col"] {
    padding-right: 5px !important;
    padding-left: 5px !important;
    margin-top: 10px;
  }

  img {
    cursor: pointer;
  }
}

.whatsapp_product {
  i,
  a {
    color: #07ac40;
  }
}
</style>
