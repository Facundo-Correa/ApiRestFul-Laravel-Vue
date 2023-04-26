<template>
  <div class="row">
    <div class="col-md-3">
      <div class="producto_data">
        <b>{{item.codigo.substr(0,3).toLowerCase() == 'ofe' ? 'Oferta' : 'Combo'}}:</b>
        ID: #{{item.codigo}}
        <br />
        {{item.nombre}}
        <br />
        <b>Descripción:</b>
        <br />
        {{item.descripcion}}
      </div>
    </div>
    <div class="col-md-4">
      <b>Productos:</b>
      <br />
      <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="prod in item.productos" :key="prod.id">
          <div class="row">
            <div class="col-3 px-0">
              <img :src="prod.image_thumb" class="w-100" />
            </div>
            <div class="col-9">
              ID: #{{prod.id}}
              <br />
              {{prod.nombre}} ({{prod.umq}} x envase)
              <br />
              {{prod.cantidad * item.cantidad}} x
              <template
                v-if="(prod.precio_actual * prod.umq * (1 -(prod.descuento /100)) ) > 0"
              >
                <span
                  class="precio"
                >${{(prod.precio_actual * prod.umq * (1 -(prod.descuento /100)) ).toFixed(2)}}</span>
                <span
                  class="precio_old"
                  v-if="prod.descuento > 0"
                >${{(prod.precio_actual*prod.umq).toFixed(2)}}</span>
              </template>
              <template v-else>
                <span class="precio">GRATIS</span>
              </template>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-md-2">
      <b>Cantidad:</b>
      <br />
      <input type="number" class="form-control" :value="item.cantidad" @change="toBasket" />
    </div>
    <div class="col-md-3">
      <b>Precio:</b>
      <br />
      <!-- Precios sin descuento -->
      {{item.cantidad}} x
      <span class="precio">${{item.precio.toFixed(2)}}</span>
      <br />
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
  computed: {
    labelClass() {
      let label = this.item.is_new ? "nuevo" : null;

      if (this.item.is_oferta) label = "oferta";
      if (this.item.is_combo) label = "combo";
      if (this.item.is_promo) label = "promo";

      return label;
    }
  },
  methods: {
    ...mapActions(["modifyBasket"]),
    toBasket(e) {
      //console.log(e.target.value);
      //console.log(this.item.cantidad);
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

<style scoped lang='scss'>
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
.promo {
  color: green;
}
.producto_data {
  position: relative;
  .label {
    position: absolute;
    top: 0;
    right: 10px;
    line-height: 40px;
    width: 40px;
    height: 40px;
    text-transform: capitalize;
    color: #ffffff;
    font-size: 10px;
    text-align: center;
    display: block;
    border-radius: 50%;

    &.promo {
      background: #da4604;
    }
    &.nuevo {
      background: #1b4b72;
    }

    &.oferta {
      background: #07ac40;
    }

    &.combo {
      background: #b70ace;
    }

    &.promo {
      background: #da4604;
    }
  }
}

.precio_old {
  text-decoration: line-through;
  font-weight: 400;
  font-size: 14px;
  margin-right: 5px;
}
.precio {
  color: #4595c2;
  font-weight: 500;
  font-size: 16px;
}
</style>