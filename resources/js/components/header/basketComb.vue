<template>
  <div class="cart_item">
    <div class="cart_img text-center">
      <b class="label-combo">{{item.codigo.substr(0,3).toLowerCase() == 'ofe' ? 'Oferta' : 'Combo'}}</b>
    </div>
    <div class="cart_info text-left">
      <a href="#">{{item.nombre}}</a>
      <p>
        <input
          type="number"
          class="w-50 form-control d-inline"
          :value="item.cantidad"
          @change="toBasket"
        /> X
        <span>${{item.precio.toFixed(2)}}</span>
      </p>
    </div>
    <div class="cart_remove">
      <a href="#" @click.prevent="deleteItemFromBasket">
        <i class="ion-android-close"></i>
      </a>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      awaitingSearch: false,
      toChange: 0
    };
  },
  props: ["item"],
  methods: {
    ...mapActions(["modifyBasket"]),
    deleteItemFromBasket() {
      this.modifyBasket([
        {
          id: this.item.id,
          quantity: -this.item.cantidad,
          is_combo: true,
          usa_puntos: false
        }
      ]).then(this.$noty.success("Producto eliminado de su carrito!"))
      .catch(err => console.log(err));
    },
    toBasket(e) {
      this.toChange += e.target.value - this.item.cantidad;

      if (!this.awaitingSearch) {
        setTimeout(() => {
          this.modifyBasket([
            {
              id: this.item.id,
              quantity: this.toChange,
              is_combo: true,
              usa_puntos: false
            }
          ]).catch(err => console.log(err));

          this.awaitingSearch = false;
          this.toChange = 0;
        }, 1000); // 1 sec delay
      }
      this.awaitingSearch = true;
    }
  }
};
</script>

<style scoped>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type="number"] {
  -moz-appearance: textfield;
}
</style>