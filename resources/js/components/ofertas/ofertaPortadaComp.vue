<template>
    <div>
        <div class="product_details mt-30 mb-60" v-if="item">
            <div class="container">

                <div class="row">

                  <div class="col-lg-6 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <img id="zoom1" :src="item.imagen">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product_d_right">
                            <form action="#">
                              <h3  >Oferta del día</h3>
                                <h1>{{ item.nombre }}</h1>

                                <div class="price_box" v-if="item.precio > 0">
                                    <span class="current_price" >${{(item.precio - (item.precio * item.descuento / 100)).toFixed(2)}}</span>
                                    <span class="old_price">${{item.precio}}</span>
                                </div>
                                <div class="price_box" v-else>
                                    <span class="current_price" >${{(item.productos[0].precio_actual - (item.productos[0].precio_actual * item.descuento /100)).toFixed(2)}}</span>
                                    <span class="old_price">${{item.productos[0].precio_actual}}</span>
                                </div>

                                <div class="product_desc">
                                    <p>{{ item.descripcion }}</p>
                                </div>

                                <div  class="modal_social" style="width: 200px;  position: relative">
                                    <h2 class="mb-1">La oferta finaliza en:</h2>
                                  <div class="product_timing">
                                    <div :data-countdown="item.finaliza"></div>
                                  </div>
                                </div>

                                <div class="product_variant quantity mt-3"  v-if="isLoggedIn">
                                  <button class="button ml-0"  @click.prevent="toBasket">Agregar al carrito</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';

    export default {
        name: 'ofertaPortadaComp',
        data() {
            return {
                result: null
            }
        },
        props:['item'],
        mounted() {

            $(this.$el).find('[data-countdown]').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">dias</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">horas</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">segs</div></div></div>'));

                });
            });

        },
        computed:{
            ...mapGetters([
                'isLoggedIn',
            ]),
        },
      methods: {
        ...mapActions(["getOfertas", "addToWishlist", "modifyBasket"]),
        toWishlist(id) {
          this.addToWishlist({id: id, is_combo: true}).then(res =>
              this.$noty.success(res)
          );
        },
        toBasket() {
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
                    ' notificara por mail cuando estos ingresen al stock. GRACIAS!!';

                if (err.response.data.message.includes('1062') == false)
                  msg = err.message;

                this.$noty.error(msg, {
                  timeout: 25000,
                  layout: 'topCenter'
                })

              });
        }
      }
    }
</script>

<style scoped lang="scss">

</style>
