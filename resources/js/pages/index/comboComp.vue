<template>
  <div v-if="combos.length">
    <!-- combos -->
    <section class="featured_product_area mb-70">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="tab_btn_container">
              <div class="section_title">
                <h2>Combos</h2>
              </div>
            </div>
          </div>
        </div>

        <carousel
          :nav="false"
          :dots="true"
          :loop="true"
          :smartSpeed="1000"
          :center="true"
          :items="1"
          v-if="combosChunk.length"
        >
          <div class="row p-1" v-for="c in combosChunk" :key="c.key">
            <!-- bucleo combos -->
            <div class="col-lg-4" v-for="combo in c.combos" :key="combo.id">
              <article class="single_product p-2">
                <figure class="h-100">
                  <div class="row">
                    <div class="col-12 titulo-combo mb-2">
                      <a href="#">
                        <h3 v-if="combo.nombre.length < 25">{{combo.nombre}}</h3>
                        <h3 v-else>{{combo.nombre.substring(0,25)+'...'}}</h3>
                      </a>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-12 product_thumb pl-3">
                          <div v-for="(n, i) in 4" class="modif combo-image" :key="n">
                            <div
                              class="img-container"
                              v-bind:style="[combo.productos[i] ? {backgroundImage: 'url('+combo.productos[i].image_thumb+')'} : {backgroundImage: 'url(assets/img/logo/ml-logo-combos.jpg)'}]"
                            ></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 pl-0">
                      <div v-if="isLoggedIn">
                        <figcaption class="product_content mt-0">
                          <div class="price_box">
                            <span class="current_price">${{combo.precio_total.toFixed(2)}}</span>
                          </div>
                          <h3 class="product_name">
                            <a v-if="combo.descripcion.length < 75">{{combo.descripcion}}</a>
                            <a v-else>{{combo.descripcion.substring(0,75)+'...'}}</a>
                          </h3>
                        </figcaption>
                        <div class="add_to_cart">
                          <a title="add to cart" @click="toBasket(combo.id)">Añadir al Carrito</a>
                        </div>
                      </div>
                      <figcaption class="product_content" v-else>
                        <h3 class="product_name">
                          <a v-if="combo.descripcion.length < 100">{{combo.descripcion}}</a>
                          <a v-else>{{combo.descripcion.substring(0,100)+'...'}}</a>
                        </h3>
                        <div class="add_to_cart">
                          <router-link to="/login">Ingresar</router-link>
                        </div>
                      </figcaption>
                    </div>
                  </div>
                </figure>
              </article>
            </div>

            <!-- completo con cajas vacias si no llega a la cantidad -->
            <template v-if="caja > 0">
              <div class="col-lg-4" v-for="i  in caja" :key="i">
                <article class="single_product p-2">
                  <figure class="h-100">
                    <div class="row">
                      <div class="col-12 titulo-combo mb-2">
                        <h3>Más Combos?</h3>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-12 product_thumb pl-3">
                            <div class="modif combo-image">
                              <div
                                class="img-container"
                                :style="{backgroundImage: 'url(\''+imgUrl+'/1_thumb.png'+'\')'}"
                              />
                            </div>
                            <div class="modif combo-image">
                              <div
                                class="img-container"
                                :style="{backgroundImage: 'url(\''+imgUrl+'/1_thumb.png'+'\')'}"
                              />
                            </div>
                            <div class="modif combo-image">
                              <div
                                class="img-container"
                                :style="{backgroundImage: 'url(\''+imgUrl+'/1_thumb.png'+'\')'}"
                              />
                            </div>
                            <div class="modif combo-image">
                              <div
                                class="img-container"
                                :style="{backgroundImage: 'url(\''+imgUrl+'/1_thumb.png'+'\')'}"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 pl-0">
                        <figcaption class="product_content mt-0">
                          <h3 class="product_name">
                            <p>Seguiremos publicando proximamente más combos para vos!</p>
                          </h3>
                        </figcaption>
                      </div>
                    </div>
                  </figure>
                </article>
              </div>
            </template>
          </div>
        </carousel>
      </div>
    </section>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import carousel from "vue-owl-carousel";

export default {
  components: { carousel },
  data() {
    return {
      items: 6,
      imgUrl: "http://www.mlrepuestos.com.ar/images/productos/thumbs"
    };
  },
  computed: {
    ...mapGetters(["combos", "isLoggedIn", "getUser"]),
    caja: function() {
      if (this.combos.length < this.items) {
        return parseInt(this.items) - parseInt(this.combos.length);
      }
    },
    combosChunk() {
      let chunks = [], // Array de prods + publis
        len = this.items, // Cantidad de prods x chunk
        i = 0, // separador
        x = 0, // contador
        n = this.combos.length; // total de productos

      while (i < n) {
        chunks.push({
          combos: this.combos.slice(i, (i += len)),
          key: Math.random() * Date.now()
        });
        x++;
      }

      return chunks;
    }
  },
  mounted() {
    if(!this.combos.length) {
      this.getCombos();
    }
  },
  methods: {
    ...mapActions(["getCombos", "addToWishlist", "modifyBasket"]),
    toWishlist(id) {
      this.addToWishlist({ id: id, is_combo: true }).then(res =>
        this.$noty.success(res)
      );
    },
    toBasket(id) {
      this.modifyBasket([
        {
          id: id,
          quantity: 1,
          is_combo: true,
          usa_puntos: false
        }
      ])
        .then(res => this.$noty.success(res.data.data))
        .catch(err => console.log(err));
    }
  }
};
</script>

<style scoped lang="scss">
.modif {
  width: 48%;
}

a:hover{
  color: #4595c2;
}

.combo-image {
  position: relative;

  .img-container {
    float: left;
    position: absolute;
    left: 2px;
    right: 2px;
    bottom: 2px;
    top: 2px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
}
.combo-image:before {
  content: "";
  float: left;
  padding-top: 100%; /* initial ratio of 1:1*/
}

.product_content {
  width: 100%;
  padding: 3px 6px 10px 0;
}

.product_thumb {
  width: 100%;
}

.price_box{
  margin-bottom: 5px;
}

.titulo-combo {
  padding-left: 18px;
  display: block;
  padding-top: 2px;

  h3 {
    margin-bottom: 2px;
    font-size: 23px !important;
  }
}

.add_to_cart {
  opacity: 0;
  visibility: visible;
  position: absolute;
  bottom: 5px;
  left: 5px;
  text-align: center;
  transition: all 0.5s ease;
  width: 78%;
}

.single_product {
  height: 220px;
}

.single_product_static {
  height: 200px;
  overflow: hidden;
  margin-bottom: 30px;
  padding: 20px 15px;
  border: 2px solid transparent;
  border-radius: 3px;
  background: #ffffff;
}
</style>
