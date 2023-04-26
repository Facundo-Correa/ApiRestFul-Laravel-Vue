<template>
  <div>
    <!-- modal area start-->
    <div
      class="modal fade"
      id="modal_box"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
      v-if="item"
      style="opacity: 100% !important; display:block;"
    >
    

      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
            @click="$emit('closeDialog')"
          >
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal_body">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                  <div class="modal_tab">
                    <div class="tab-content product-details-large">
                      <template v-if="item.productos.length">
                        <carousel
                          :autoplay="true"
                          :dots="true"
                          :nav="false"
                          :autoplayHoverPause="true"
                          :loop="true"
                          :center="true"
                          :items="1"
                        >
                          <img
                            :src="prod.image_thumb"
                            v-for="prod of item.productos"
                            :key="prod.id"
                          />
                        </carousel>
                      </template>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                  <div class="modal_right">
                    <div class="modal_title mb-10">
                      <h2>{{item.productos[0].id}} - {{ item.nombre }}</h2>
                      <p style="margin: 0!important;">OFERTA: {{item.codigo}}</p>
                    </div>
                    <div class="modal_price mb-10" v-if="isLoggedIn">
                      <span class="new_price">${{(item.precio_total).toFixed(2)}}</span>
                      <span class="old_price">${{item.precio_total_sin_desc}}</span>
                    </div>
                    <div class="modal_description mb-15">
                      <p>{{ item.descripcion}}</p>
                    </div>
                    <div
                      class="modal_social"
                      style="width: 200px; height: 80px; position: relative"
                    >
                      <h2>La oferta finaliza en:</h2>
                      <div class="product_timing">
                        <div :data-countdown="item.hasta"></div>
                      </div>
                    </div>
                  </div>

                  <div class="variants_selects mt-3">
                    <div class="modal_add_to_cart">
                      <form action="#">
                        <input min="0" max="100" step="1" value="1" type="number" v-model="qtyCart" />
                        <button @click.prevent="toBasket">Agregar al carrito</button>
                        <button
                          class="btn-primary w-auto wishBtn"
                          title="Agregar a Favoritos"
                          @click.prevent="toWishlist"
                        >
                          <i class="fa fa-heart"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                  
                  <div class="whatsapp_product mb-15">
                    <i class="fa fa-whatsapp"></i>
                    <a href="https://web.whatsapp.com/send?phone=541130607993&text=Hola%20quiero%20realizar%20una%20consulta.%20" target="_blank">CONSULTAR POR ESTA OFERTA POR WHATSAPP</a>
                  </div>
                  <!-- SE COMENTA EL CODIGO PARA COMPARTIR POR REDES SOCIALES
                  <div class="modal_social">
                    <h2>Compartí este producto</h2>
                    <ul>
                      <li class="facebook">
                        <a href="#">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li class="twitter">
                        <a href="#">
                          <i class="fa fa-twitter"></i>
                        </a>
                      </li>
                      <li class="pinterest">
                        <a href="#">
                          <i class="fa fa-pinterest"></i>
                        </a>
                      </li>
                      <li class="google-plus">
                        <a href="#">
                          <i class="fa fa-google-plus"></i>
                        </a>
                      </li>
                      <li class="linkedin">
                        <a href="#">
                          <i class="fa fa-linkedin"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- modal area end-->
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import carousel from "vue-owl-carousel";

export default {
  components: { carousel },
  data() {
    return {
      qtyCart: 1
    };
  },
  props: ["item"],
  computed: {
    ...mapGetters(["isLoggedIn"])
  },
  mounted() {
    $(this.$el)
      .find("[data-countdown]")
      .each(function() {
        var $this = $(this),
          finalDate = $(this).data("countdown");
        $this.countdown(finalDate, function(event) {
          $this.html(
            event.strftime(
              '<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">dias</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">horas</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">segs</div></div></div>'
            )
          );
        });
      });
  },
  methods: {
    ...mapActions(["addToWishlist", "modifyBasket"]),
    toWishlist() {
      this.addToWishlist({ id: this.item.id, is_combo: true }).then(res =>
        this.$noty.success(res)
      );
    },
    toBasket() {

      //console.log(this.item)
      this.modifyBasket([
        {
          id: this.item.id,
          quantity: 1,
          is_combo: true,
          usa_puntos: false
        }
      ])
          .then(res => {
            //console.log(res.data.data.status);
            switch (res.data.data.status) {
              case 205:

                this.$noty.warning(res.data.data.data, {
                  layout: 'center',
                  timeout: 25000,
                });
                break;
              default:
                this.$noty.success(res.data.data.data)
                break;
            }

          })
          .catch(err => {
            var msg = 'Este producto ya lo agrego a su lista de alerta de stock.' +
                ' Le recordamos que los productos sin stock o por pedido solo se pueden agregar una vez y se' +
                ' notificara por mail cuando estos ingresen al stock. GRACAIS!!';

            if (err.response.data.message.includes('1062') == false)
              msg = err.message;

            this.$noty.error(msg, {
              timeout: 25000,
              layout: 'topCenter'
            })

          });
    }
  },

};
</script>


<style scoped lang="scss">
.wishBtn {
  background-color: #4595c2;
  border-color: #4595c2;

  &:hover {
    background-color: #242424;
    border-color: #242424;
  }
}

.whatsapp_product{
  i, a{
    color: #07ac40;
  }
}

</style>
