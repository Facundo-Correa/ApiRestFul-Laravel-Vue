<template>
  <div class="header_wishlist presupuestos" id="wishlistIcon">
    <div>
    <a class="row">
        <!-- <h5>Presupuestos</h5> -->
        <i class="fa fa-file-text" aria-hidden="true"></i>
    </a>
    </div>
    <span class="wishlist_quantity" v-if="!wishlistLoading">{{wishlist.total}}</span>
    <div class="mini_cart">
      <!-- IF NO ITEMS -->
      <div class="cart_item" v-if="wishlistLoading || wishlist.total < 1">
        <p>No posee elementos en Presupuestos.</p>
      </div>
      <!-- IF ITEMS -->
      <template v-else>
        <div class="cart_item" v-for="item of wishlist.data" :key="item.id">
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
          </div>
          <div class="cart_remove">
            <a @click="remove(item.id, item.is_combo)">
              <i class="ion-android-close"></i>
            </a>
          </div>
        </div>
        <div class="row" style="justify-content:space-between;">
          <h5>SUBTOTAL</h5>
          <b>${{subtotal.toFixed(2)}}</b>
        </div>
        <div class="row" style="justify-content:space-between;">
          <h5>IVA:</h5>
          <b>${{iva.toFixed(2)}}</b>
        </div>
        <div class="row" style="justify-content:space-between;">
          <h5>Total:</h5>
          <b>${{total.toFixed(2)}}</b>
        </div>
        <div>
          <router-link :to="{name:'Presupuesto'}">
            <button class="btn btn-primary presupuestosBoton">Siguiente</button>
          </router-link>
        </div>
        <Presupuesto v-if="showPresupuesto"
        :showPresupuesto = showPresupuesto
        @close="close"/>
      </template>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import Presupuesto from "../modals/presupuesto.vue"; 
import mobileChecker from "../../mixins/mobileChecker";

export default {
    data(){
      return {
        showPresupuesto: false,
      }
    },
    components: { Presupuesto },
    mounted() {
        this.getWishlist();
    },
    computed: {
        ...mapGetters(["wishlist", "wishlistLoading"]),
        subtotal(){
          if(this.wishlist.data){
            let precios = [];
            for(let i=0; i<this.wishlist.total; i++){
              precios[i] = this.wishlist.data[i].precio;
            }
            let total = precios.reduce((a, b) => a + b, 0);
          return total;
          }
        },
        iva() {
          return this.subtotal * 0.21;
        },
        total() {
          return this.subtotal + this.iva;
        },
    },
    methods: {
        ...mapActions(["getWishlist", "removeFromWishlist", "modifyBasket"]),
      remove(id, is_combo) {
          this.removeFromWishlist({ id: id, is_combo: is_combo }).then(res => this.$noty.success(res));
      },
      close(){
        this.showPresupuesto=false;
        if(isMobile){
                this.$router.push({name:'home'});
            }
            else{
                this.$router.push({name:'productos',params:{search:'nuevos'}});
            }
      },
    }
};
</script>

<style scoped lang="scss">
#wishlistIcon:hover .mini_cart {
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
