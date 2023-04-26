<template>
  <div class="cart_item">
    <div class="cart_img">
      <img :src="item.image_thumb" alt />
    </div>
    <div class="cart_info text-left">
      {{item.nombre}}
      <p>
        <input
          type="number"
          class="w-50 form-control d-inline"
          :value="item.cantidad"
          @change="toBasket"
        /> X
        <span>${{(item.precio*item.umq).toFixed(2)}}</span>
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
      toChange: 0,
      processingRequest: false, // || Replicando el JascaScript
    };
  },
  props: ["item"],
  methods: {
    ...mapActions(["modifyBasket"]),
    deleteItemFromBasket() {
      if (this.processingRequest) {
        // || Notificar al usuario que no sea tan hijo de pta y no presione tantas veces el pinche click. Muchas gracias.
        this.$noty.warning("Aguarde un momento por favor", {
          layout: "top",
          timeout: 3000,
        });
        setTimeout(() => {
          // on success or failure
          // reset the state
          this.processing = false;
        }, 3000);
        return;
      }
      this.processingRequest = true;
      this.modifyBasket([
        {
          id: this.item.id,
          quantity: -this.item.cantidad,
          is_combo: false,
          is_oferta: this.item.is_promo,
          usa_puntos: this.item.usa_puntos
        }
      ]).then(() => {
        this.processingRequest = false;
        this.$noty.success("Producto eliminado de su carrito!")
      }).catch(err => console.log(err));
    },
    toBasket(e) {
      this.toChange += e.target.value - this.item.cantidad;

      if (!this.awaitingSearch) {
        setTimeout(() => {
          this.modifyBasket([
            {
              id: this.item.id,
              quantity: this.toChange,
              is_combo: false,
              is_oferta:this.item.is_promo,
              usa_puntos: this.item.usa_puntos
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