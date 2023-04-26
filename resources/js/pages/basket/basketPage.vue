<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Mi Carrito</h2>
      </div>
    </div>
    <div class="row mt-4 mb-5">
      <div class="col">
        <ul class="list-group">
          
          <!-- Productos -->
          <template v-if="basketProductos.length">
            <li class="list-group-item" v-for="item in basketProductos" :key="item.id">
              <basketProducto :item="item" />
            </li>
          </template>
          <!-- Combos (los combos son las ofertas) -->
          <template v-if="basketCombos.length">
            <li class="list-group-item" v-for="item in basketCombos" :key="item.id">
              <basketCombo :item="item" />
            </li>
          </template>
          <li class="list-group-item list-group-item-primary" v-if="puntosPorDescontar > 0">
            <div class="row justify-content-end">
              <div class="col-md-3 text-right">
                <b>PUNTOS A DESCONTAR:</b>
              </div>
              <div class="col-md-2 text-left">{{puntosPorDescontar}}</div>
            </div>
          </li>
          <li class="list-group-item list-group-item-primary">
            <div class="row justify-content-end">
              <div class="col-md-3 text-right">
                <b>SUBTOTAL:</b>
              </div>
              <div class="col-md-2 text-left">$ {{subtotal.toFixed(2)}}</div>
            </div>
          </li>
          <li class="list-group-item list-group-item-primary">
            <div class="row justify-content-end">
              <div class="col-md-3 text-right">
                <b>IVA:</b>
              </div>
              <div class="col-md-2 text-left">$ {{iva.toFixed(2)}}</div>
            </div>
          </li>
          <li class="list-group-item list-group-item-primary">
            <div class="row justify-content-end">
              <div class="col-md-3 text-right">
                <b>TOTAL:</b>
              </div>
              <div class="col-md-2 text-left">$ {{total.toFixed(2)}}</div>
            </div>
          </li>
        </ul>

        <a class="btn btn-primary mt-4 mx-auto d-block" @click="goToSummary">Continuar con la Compra</a>
        <a class="btn btn-outline-danger mt-2 mx-auto d-block" @click="vaciarCarrito">Vaciar Carrito</a>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  mounted() {
    setTimeout(() => {
      if (!this.total) {
        this.$noty.error("Su carrito esta vacio");
        this.$router.push({ name: "home" });
      }
    }, 1000);
  },
  computed: {
    ...mapGetters(["userBasket", "basketProductos", "basketCombos", "getUser"]),
    subtotal() {
      let total = 0;

      // sumarizo los productos
      if (this.basketProductos.length) {
        total += this.basketProductos.reduce((a, b) => {
          let sinPromo = 0;
          let conPromo = 0;

          if (b.usa_puntos) {
            return a + b.puntos_price * b.cantidad;
          }
          // Sumo los precios sin promo
          if (b.precio_sin_desc) {
            sinPromo +=
              b.precio_sin_desc.precio * b.precio_sin_desc.cantidad * b.umq;
          }
          // Sumo los precios con promo
          if (b.precio_con_desc.length) {
            b.precio_con_desc.map(x => {
              conPromo += x.precio * x.cantidad * b.umq;
            });
          }

          return a + sinPromo + conPromo;
        }, 0);
      }

      // sumarizo los combos
      if (this.basketCombos.length) {
        total += this.basketCombos.reduce((a, b) => {
          return a + b.precio * b.cantidad;
        }, 0);
      }

      return total;
    },
    total() {
      return this.subtotal + this.iva;
    },
    iva() {
      return this.subtotal * 0.21;
    },
    puntosPorDescontar() {
      let total = 0;

      // sumarizo los productos
      if (this.basketProductos.length) {
        total += this.basketProductos.reduce((a, b) => {
          return a + (b.usa_puntos ? b.puntos * b.cantidad : 0);
        }, 0);
      }

      return total;
    }
  },
  methods: {
    ...mapActions(["clearBasket"]),
    vaciarCarrito() {
      this.clearBasket().then(() => {
        this.$router.push({ name: "productos", params: { search: "nuevos" } });
      });
    },
    goToSummary() {
      if (this.puntosPorDescontar > this.getUser.total_puntos) {
        this.$noty.error(
          "Ustedes tiene solo " +
            this.getUser.total_puntos +
            " puntos. No puede canjear " +
            this.puntosPorDescontar
        );
      } else {
        this.$router.push({ name: "summary" });
      }
    }
  }
  
};
</script>