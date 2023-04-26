<template>
    <div class="header_wishlist" id="favoritosIcon">
      <div>
        <a class="row">
            <i class="fa fa-heart-o" aria-hidden="true"></i>
        </a>
      </div>
      <span class="wishlist_quantity" v-if="!favoritosLoading">{{favoritos.total}}</span>
      <div class="mini_cart">
        <!-- IF NO ITEMS -->
        <div class="cart_item" v-if="favoritosLoading || favoritos.total < 1">
          <p>No posee elementos en Favoritos.</p>
        </div>
        <!-- IF ITEMS -->
        <template v-else>
          <div class="cart_item" v-for="item of favoritos.data" :key="item.id">
            <div class="cart_img" v-if="item.image_thumb">
              <img :src="item.image_thumb" />
            </div>
            <div class="cart_info">
              <a>{{item.nombre}}</a>
              <div class="row">
                <p>
                  <span>${{item.precio}}</span>
                </p>
              </div>
              <button class="btn btn-sm btn-outline-primary rounded-circle"
              @click="toBasket(item.id, item.is_combo)" >
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
            <div class="cart_remove">
              <a @click="remove(item.id, item.is_combo)">
                <i class="ion-android-close"></i>
              </a>
            </div>
            <div>
              <!-- agregar un boton de add to basket -->
            </div>
          </div>
        </template>
      </div>
    </div>
  </template>
  
  <script>
  import { mapActions, mapGetters } from "vuex";
  
  export default {
      data(){
        return {
        }
      },
      mounted() {
          this.getFavoritos();
      },
      computed: {
          ...mapGetters(["favoritos", "favoritosLoading"]),
      },
      methods: {
          ...mapActions(["getFavoritos", "removeFromFavoritos", "modifyBasket"]),
          remove(id, is_combo) {
              this.removeFromFavoritos({ id: id, is_combo: is_combo }).then(res => this.$noty.success(res));
          },
          toBasket(id, is_combo) {
            this.modifyBasket([
              { id: id, quantity: 1, is_combo: is_combo, usa_puntos: false }
            ]).then(
              this.removeFromFavoritos({ id: id, is_combo: is_combo }),
              this.$noty.success("Producto agregado a su carrito!")
              )
          }
      }
  };
  </script>
  
  <style scoped lang="scss">
  #favoritosIcon:hover .mini_cart {
    max-height: 500px;
    padding: 18px 28px 33px;
    visibility: visible;
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
  .evenly{
    justify-content: space-between;
  }
  </style>
  