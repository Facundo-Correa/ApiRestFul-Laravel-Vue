<template>
  <div v-if="ofertas.length">
    <!-- ofertas-->
    <section class="product_area mb-46">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section_title">
              <h2>OFERTAS</h2>

            </div>
          </div>
        </div>
        <carousel
          :autoplay="true"
          :nav="false"
          :dots="true"
          :autoplayHoverPause="true"
          :center="true"
          :responsive="responsiveCfg"
        >
          <article class="single_product" v-for="item in ofertas" :key="item.id">
            <figure>
              <div class="product_thumb">
                <div style="width:170px; overflow: hidden; height: 120px;">
                  <img :src="item.productos.length ? item.productos[0].image_thumb : imgDefault" />
                </div>
                <div class="action_links" v-if="isLoggedIn">
                  <ul>
                    <li class="quick_button">
                      <a
                        @click="activeOferta=item"
                        href="#"
                        data-toggle="modal"
                        data-target="#modal_box"
                        title="Ver Oferta"
                      >
                        <span class="ion-ios-search-strong"></span>
                      </a>
                    </li>
                    <li class="compare">
                      <a @click="toBasket(item.id)" title="Agregar al carrito">
                        <i class="fa fa-shopping-cart"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="action_links" v-else>
                <ul>
                <li class="quick_button">
                  <a
                    @click="activeOferta=item"
                    href="#"
                    data-toggle="modal"
                    data-target="#modal_box"
                    title="Ver Oferta"
                  >
                    <span class="ion-ios-search-strong"></span>
                  </a>
                </li>
                </ul>
                </div>

                <div class="product_timing" style="width: 170px;">
                  <div :data-countdown="item.hasta"></div>
                </div>
              </div>
              <figcaption class="product_content">
                <div class="price_box">
                  <span class="old_price">${{item.precio_total_sin_desc.toFixed(2)}}</span>
                  <span class="current_price">${{item.precio_total.toFixed(2)}} {{abreviatura(item)}}</span>
                </div>
                <h3 class="product_name">
                  <a
                    @click="activeOferta=item"
                    href="#"
                    data-toggle="modal"
                    data-target="#modal_box"
                    title="quick view"
                  >{{item.nombre}} </a>
                  <h6>{{ presentacion(item) }}</h6>
                </h3>
              </figcaption>
            </figure>
          </article>
        </carousel>
      </div>
    </section>

    <modal-ofertas v-if="activeOferta" :item="activeOferta" @closeDialog="activeOferta = null"></modal-ofertas>
  </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import { mapActions, mapGetters } from "vuex";

export default {
  components: { carousel },
  data() {
    return {
      activeOferta: null,
      item: null,
      imgUrl: "http://www.mlrepuestos.com.ar/images/productos/thumbs",
      responsiveCfg: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        },
        992: {
          items: 4
        },
        1200: {
          items: 5
        }
      }
    };
  },
  computed: {
    ...mapGetters(["ofertas", "isLoggedIn", "getUser"]),
    imgDefault() {
      return "http://www.mlrepuestos.com.ar/images/productos/thumbs/1_thumb.png";
    }
  },
  mounted() {
    if (!this.ofertas.length) {
      this.getOfertas(15).then((response)=> {
        //console.log("OFERTAS: ", this.ofertas);

      });

    }
    setTimeout(() => {
      this.$nextTick(() => {
        /*---countdown activation---*/

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
      });
    }, 2000);
  },

  methods: {
    ...mapActions(["getOfertas", "addToWishlist", "modifyBasket"]),
    toWishlist(id) {
      this.addToWishlist({ id: id, is_combo: true }).then(res =>
        this.$noty.success(res)
      );
    },
    abreviatura(item) {
      //console.log(item)
      let abrev = 'c/u';
      if (item.productos[0].um === 'PAR')
        abrev = 'c/par';
      if (item.productos[0].um === 'JGO' || item.productos[0].um === 'BJ')
        abrev = 'c/jgo';

      return abrev;
    },
    presentacion(item) {
      let unidad = 'unidad';
      if (item.productos[0].umq > 1)
        unidad = 'unidades';

      if (item.productos[0].um === 'PAR') {
        unidad = 'par';

        if (item.productos[0].umq > 1)
          unidad = 'pares';
      }
      if (item.productos[0].um === 'JGO' || item.productos[0].um === 'BJ') {
        unidad = 'juego';

        if (item.productos[0].umq > 1)
          unidad = 'juegos';
      }


      return 'Cantidad por Envase: ' + item.productos[0].umq + ' ' + unidad;
    },

    toBasket(id) {


      //console.log(this)
      this.modifyBasket([
        {
          id: id,
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
  }
};
</script>

<style scoped>
owl-carousel .owl-nav .owl-prev,
.owl-carousel .owl-nav .owl-next,
.owl-carousel .owl-dot {
  cursor: pointer;
  margin-left: -25px;
  margin-right: -20px;
  font-size: 30px;
}
.single_product{
  margin-left: 15px;
  margin-right: 10px;
}
.product_thumb {
  height: 186px;
}
.product_content h3 {
  min-height: 40px;
}
</style>
