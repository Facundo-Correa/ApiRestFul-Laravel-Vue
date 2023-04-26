<template>
  <vue-modal :size="'md'" @close="$emit('close')">
    <template slot="title"></template>
    <template slot="body">
      <div class="container">
        <div class="row" id="c">
          <div class="column">
            <div id="img-container">
              <div id="lens"></div>
              <!-- imagen del producto -->
              <img :src="producto.image" id="featured" />
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-12">
            <div
              id="zimage"
              style="
                position: absolute;
                z-index: 100;
                height: 380px;
                width: 380px;
                background-color: white;

                border: 1px solid #cdcdcd;
                border-radius: 20px;
              "
            ></div>
            <div class="modal_right">
              <div class="modal_title mb-10" id="modal_title mb-10">
                <h2 style="padding-left: 5px">
                  {{ producto.id }} - {{ producto.nombre }}
                </h2>
                <div class="semaforo">
                  <span :style="{ 'background-color': status.color }"></span>
                  {{ status.txt }}
                </div>
                <!--<h5>Origen: {{ producto.origen.origen }}</h5> || No trae origen-->
                <h5>{{ presentacion }}</h5>
              </div>
              <div class="modal_price mb-10">
                <span class="new_price">
                  ${{ producto.precio_actual }} {{ abreviatura }}</span
                >
                <span class="old_price" v-if="producto.descuento > 0">
                  ${{ (producto.precio_actual * producto.descuento) / 100 }}
                </span>

                <!--<div>{{ total }}</div>-->
              </div>
              <hr />
              <div class="modal_description mb-15">
                <h4>Descripción</h4>
                <p>{{producto.descripcion}}</p>
              </div>

              <div
                class="modal_social"
                style="width: 200px; height: 80px; position: relative"
              >
              

              <div class="variants_selects">
                <div class="modal_add_to_cart">
                  <input
                    min="0"
                    max="100"
                    step="1"
                    type="number"
                    v-model="qtyCart"
                  />
                  <button @click="toBasket">Agregar al carrito</button>
                </div>
              </div>
              <div class="whatsapp_product mb-15">
                <i class="fa fa-whatsapp"></i>
                <a
                  v-if="isMobile"
                  :href="
                    'https://api.whatsapp.com/send?phone=5491130607993&text=Hola%20soy%20' +
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
                    'https://web.whatsapp.com/send?phone=5491130607993&text=Hola%20soy%20' +
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
    </template>
  </vue-modal>
</template>

<script>
import { mapActions } from "vuex";
import productMixin from "../../mixins/productMixin";
import mobileChecker from "../../mixins/mobileChecker";

import Vuex from "vuex";

export default {
  mixins: [productMixin, mobileChecker],
  data() {
    return {
      qtyCart: null,
      n_plataforma: "",
      nombre: "",
      cantidadCriterio: "",
      desde: "",
      hasta: "",
      tiempoRestante: "",
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
          // || console.log(res.data.data.status);
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

          if (err.response.data.message.includes("1062") == false)
            msg = err.message;

          this.$noty.error(msg, {
            timeout: 25000,
            layout: "topCenter",
          });
        });
    },

    zoomv2(self) {
      function imageZoom(imgID) {
        let img = document.getElementById(imgID);
        let lens = document.getElementById("lens");

        //lens.style.backgroundImage = `url(${img.src})`;

        let zi = document.getElementById("zimage");
        zi.style.backgroundImage = `url(${img.src})`;
        zi.style.backgroundRepeat = "no-repeat";

        // || Zoom
        let ratio = 3;

        lens.style.backgroundSize =
          img.width * ratio + "px " + img.height * ratio + "px";
        zi.style.backgroundSize =
          img.width * ratio + "px " + img.height * ratio + "px";

        img.addEventListener("mousemove", moveLens);
        //img.addEventListener("touchmove", moveLens);
        //lens.addEventListener("mousemove", moveLens);

        img.addEventListener("mouseout", function () {
          lens.style.visibility = "hidden";
          zi.style.visibility = "hidden";
        });

        img.addEventListener("mouseenter", function () {
          zi.style.visibility = "visible";
          lens.style.visibility = "visible";
        });

        img.style.cursor = "none";

        function moveLens() {
          let pos = getCursor();

          let positionLeft = pos.x - 30;
          let positionTop = pos.y - 30;

          lens.style.left = positionLeft + "px";
          lens.style.top = positionTop + "px";
          let clampX =
            parseInt(lens.style.left) + lens.getBoundingClientRect().width;

          let clampY =
            parseInt(lens.style.top) + lens.getBoundingClientRect().height;

          if (
            clampX >= img.getBoundingClientRect().width ||
            clampY >= img.getBoundingClientRect().height
          ) {
          } else {
            zi.style.visibility = "visible";
            lens.style.visibility = "visible";

            lens.style.left = positionLeft + "px";
            lens.style.top = positionTop + "px";

            /*zi.style.backgroundPosition =
              "-" + pos.x * ratio + "px -" + pos.y * ratio + "px";*/

            zi.style.backgroundPositionY = -(pos.y - 60) * ratio + "px";
            zi.style.backgroundPositionX = -(pos.x - 60) * ratio + "px";

            // || console.log(zi.style.backgroundSize);
            // || console.log(zi.style.backgroundPositionY);
          }

          /*lens.style.backgroundPosition =
            "-" + pos.x * ratio + "px -" + pos.y * ratio + "px";*/
        }

        function getCursor() {
          let e = window.event;
          let bounds = img.getBoundingClientRect();

          let x = e.pageX - bounds.left;
          let y = e.pageY - bounds.top;

          x = x - window.pageXOffset;
          y = y - window.pageYOffset;

          return { x: x, y: y };
        }
      }

      imageZoom("featured");
    },
  },
  mounted: function () {
    this.n_plataforma = this.$store.getters.getUser.persona.n_plataforma;
    this.nombre =
      this.$store.getters.getUser.persona.nombre +
      this.$store.getters.getUser.persona.apellido;

    //console.log(this.producto);
    // || Get the offer info if it's an offer || //
    if(this.producto.is_promo){
      axios
      .post("/api/admin/admofertas/isOffer", { id: this.producto.id })
      .then((response) => {
        if (response.data != "" && response.data.data != "") {
          this.producto.descripcion = response.data.data.descripcion;
          this.producto.precio_actual =
            (this.producto.precio_actual * response.data.data.descuento_gral) /
              100 +
            " x " +
            response.data.cantidad +
            " unidades";
          this.hasta = response.data.data.hasta;
        }
        //console.log(response);
      });
    }

    let self = this;
    setTimeout(function () {
      self.zoomv2(self);
    }, 1000);
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

#img-container {
  z-index: 100;
  max-width: 300px;
  position: relative;
}

#lens {
  z-index: 101;
  position: absolute;
  height: 60px;
  width: 60px;

  border: 1px solid black;
  background: rgba(255, 255, 255, 0.308);
  background-repeat: no-repeat;
  pointer-events: none;

  border-radius: 50px;
  visibility: hidden;
}

#zimage {
  visibility: hidden;
}
</style>
