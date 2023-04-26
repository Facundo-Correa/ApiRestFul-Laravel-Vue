<template>
  <article class="recent_product_list">
    <figure>
      <div class="product_content">
        <h3>
          <b>{{combo.nombre}}</b>
        </h3>
        <p>{{combo.descripcion}}</p>
        <div class="price_box">
          <span class="current_price">${{combo.precio_total.toFixed(2)}}</span>
        </div>
        <ul class="actions">
          <li>
            <a
              href="javascript:void(0)"
              title="Agregar a Favoritos"
              @click="toWishlist(combo.id)"
            >
              <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)" title="Calcular" @click="showModalCalc = true">
              <i class="fa fa-calculator"></i>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)" title="Agregar al Carrito" @click="toBasket">
              <i class="fa fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </figure>

    <productCalcModal v-if="showModalCalc" @close="showModalCalc=false" :producto="combo" />
  </article>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "productCombo",
  data() {
    return {
      showModal: false,
      showModalCalc: false
    };
  },
  props: ["combo"],
  methods: {
    ...mapActions(["addToWishlist", "modifyBasket"]),
    toWishlist(id) {
      this.addToWishlist({ id: id, is_combo: true }).then(res =>
        this.$noty.success(res)
      );
    },
    toBasket() {
      this.modifyBasket([
        {
          id: this.combo.id,
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
ul.actions {
  margin-top: 10px;

  li a {
    float: left;
    line-height: 34px;
    width: 32px;
    height: 32px;
    text-align: center;
    font-size: 17px;
    background: #4595c2;
    color: #ffffff;
    display: block;
    transition: all 0.5s ease;
    border-radius: 50%;
    margin-right: 5px;
    cursor: pointer;
  }
}

.product_content {
  width: 100% !important;
}
</style>
