<template>
  <vue-modal :size="'md'" @close="$emit('close')">
    <template slot="title"> <h2>UPS!! parece que ho hay más!!</h2><h4>Pero tenemos estos alternativos para ofrecerte</h4> </template>
    <template slot="body">
      <div class="container">

        <div
            id="shopMain"
            class="row shop_wrapper no-gutters"
            v-if="productos &&
              productos.length"
        >
          <!-- PRODUCTOS Y PUBLIS -->

            <product-card
                v-for="producto in productos"
                :producto="producto"
                :key="producto.id"
                :classChange = "classChange"

            />


        </div>

        <div class="row shop_wrapper" v-if="productosLoading">
          <div class="col">
            <loader class="mt-5" />
          </div>
        </div>
      </div>
    </template>
  </vue-modal>
</template>

<script>
import { mapActions } from "vuex";


export default {
  data() {
    return {
      qtyCart: null,
      productosLoading:false
    };
  },
  props:['productos','classChange'],

  methods: {
    ...mapActions(["modifyBasket"]),
    toBasket() {
      this.modifyBasket([
        {
          id: this.producto.id,
          quantity: this.qtyCart,
          is_combo: false,
          usa_puntos: false
        }
      ])
          .then(res => {
            //console.log(res.data.data.status);
            switch (res.data.data.status) {
              case 205:

                this.$noty.warning(res.data.data.data,{
                  layout: 'center',
                  timeout:8000,
                });
                break;
              default:
                this.$noty.success(res.data.data.data)
                break;
            }

          })
          .catch(err => {
            var msg='Este producto ya lo agrego a su lista de alerta de stock.' +
                ' Le recordamos que los productos sin stock o por pedido solo se pueden agregar una vez y se' +
                ' notificara por mail cuando estos ingresen al stock. GRACAIS!!';

            if(err.response.data.message.includes('1062') == false)
              msg=err.message;

            this.$noty.error(msg,{
              timeout:10000,
              layout:'topCenter'
            })

          });

    }
  }
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

.whatsapp_product{
  i, a{
    color: #07ac40;
  }
}
</style>
