<template>
  <div class="mini_cart_wrapper">
    <a>
      <i class="fa fa-shopping-cart"></i>
      ${{(subtotalBasket*1.21).toFixed(2)}}
      <i class="fa fa-angle-down"></i>
    </a>
    <span class="cart_quantity">{{userBasket.total}}</span>

    <!--mini cart-->
    <div class="mini_cart">
      <!-- Productos -->
      <basket-prod v-for="item of basketProductos" :key="item.id" :item="item" />

      <!-- Combos -->
      <basket-comb v-for="item of basketCombos" :key="item.id" :item="item" />

      <div class="mini_cart_table">
        <div class="cart_total">
          <span>Sub total:</span>
          <span class="price">${{subtotalBasket}}</span>
        </div>
        <div class="cart_total mt-10">
          <span>Iva:</span>
          <span class="price">${{(subtotalBasket*0.21).toFixed(2)}}</span>
        </div>
        <div class="cart_total mt-10">
          <span>Total:</span>
          <span class="price">${{(subtotalBasket*1.21).toFixed(2)}}</span>
        </div>
      </div>

      <div class="mini_cart_footer">
        <div class="cart_button">
          <router-link :to="{name:'basket'}">Comprar</router-link>
        </div>
      </div>
    </div>
    <!--mini cart end-->
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  mounted() {
    this.getBasket().catch(err => this.showError(err));
  },
  computed: {
    ...mapGetters(["basketProductos", "basketCombos", "userBasket"]),
    subtotalBasket() {
      let total = 0;

      // sumarizo los productos
      if (this.basketProductos.length) {
        total += this.basketProductos.reduce((a, b) => {
          return a + b.precio * b.umq * b.cantidad;
        }, 0);
      }

      // sumarizo los combos
      if (this.basketCombos.length) {
        total += this.basketCombos.reduce((a, b) => {
          return a + b.precio * b.cantidad;
        }, 0);
      }
      return total.toFixed(2);
    }
  },
  methods: {
    ...mapActions(["getBasket", "clearBasket"])
  }
};
</script>

<style scoped>
.mini_cart {
  overflow: auto;
}
.cart_img:hover,
.cart_img {
  border: none !important;
}
.label-combo {
  background: #b70ace;
  border-radius: 1rem;
  color: #fff;
  padding: 5px 8px;
  font-size: 11px;
}
</style>
