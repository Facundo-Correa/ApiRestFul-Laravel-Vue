<template>
  <div class="row">
    <div class="col-md-3">
      <div class="producto_data">
        <b>Producto:</b>
        ID: #{{item.id}}
        <br />
        <img :src="item.image_thumb" class="w-100" />
        <span class="label" v-if="labelClass" :class="labelClass">{{labelClass}}</span>
      </div>
    </div>
    <div class="col-md-4">
      <b>Descripción:</b>
      <br />
      {{item.nombre}}
      <br />
      {{presentacion}}
      <br />
      <p class="alert alert-danger" v-if="item.umq >1 && totalunidades >1 "> Esta seguro en solicitar {{totalunidades}} unidades del articulo? Le recordamos que la cantidad es por el total del envase y no las unidades.</p>
    </div>
    <div class="col-md-2">
      <b>Cantidad:</b>
      <br />
      <input type="number" class="form-control" :value="item.cantidad" @change="toBasket" />
    </div>
    <div class="col-md-3">
      <b>Precio:</b>
      <br />
      <!-- Si usa puntos, usamos ese precio y descontamos puntos en siguiente paso -->
      <template v-if="item.usa_puntos">
        {{item.cantidad}} x
        <span class="precio">${{(item.puntos_price).toFixed(2)}}</span>
        +
        <span class="promo">{{item.puntos}} puntos</span>
      </template>

      <!-- Si no usa puntos, mostramos los precios normales -->
      <template v-else>
        <!-- Precios sin descuento --
        <template v-if="item.precio_sin_desc">-->
        <template>
          {{item.cantidad}} x
          <span
            class="precio"
          >${{item.precio}}</span>
          <br />
        </template>

        <!-- Precios con descuento por Promociones --
        <template v-if="item.precio_con_desc.length">
          <div v-for="promo in item.precio_con_desc" :key="promo.descripcion">
            <template v-if="promo.precio">
              {{promo.cantidad}} x
              <span class="precio">${{(promo.precio*item.umq).toFixed(2)}}</span>
              <span class="precio_old">${{(promo.precio_old*item.umq).toFixed(2)}}</span>
            </template>
            <template v-else>
              {{promo.cantidad}} x
              <span class="precio">GRATIS</span>
            </template>
            <p class="promo">{{promo.descripcion}}</p>
            <br />
          </div>
        </template>-->
      </template>
    </div>
    <div class="col-12" v-if="item.puntos">
      <hr />
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="true" v-model="item.usa_puntos" />
        <label class="form-check-label">
          Te gustaría cambiar puntos? LLevate este producto por
          <span
            class="promo"
          >${{item.puntos_price.toFixed(2)}} + {{item.puntos}} puntos</span> c/unidad
        </label>
      </div>
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
      finalItem: {}
    };
  },
  props: ["item"],
  watch: {
    "item.usa_puntos": {
      handler(val) {
        this.modifyBasket([
          {
            id: this.item.id,
            quantity: 0,
            is_combo: false,
            usa_puntos: val
          }
        ]).catch(err => console.log(err));
      }
    },
    "item.usa_puntos": {
      handler(val) {
        this.modifyBasket([
          {
            id: this.item.id,
            quantity: 0,
            is_combo: false,
            usa_puntos: val
          }
        ]).catch(err => console.log(err));
      }
    }
  },
  computed: {
    labelClass() {
      let label = this.item.is_new ? "nuevo" : null;

      if (this.item.is_oferta) label = "oferta";
      if (this.item.is_combo) label = "combo";
      if (this.item.is_promo) label = "promo";

      return label;
    },

    presentacion() {
      let unidad = "unidad";
      if (this.item.umq > 1) unidad = "unidades";

      if (this.item.um === "PAR") {
        unidad = "par";

        if (this.item.umq > 1) unidad = "pares";
      }
      if (this.item.um === "JGO" || this.item.um === "BJ") {
        unidad = "juego";

        if (this.item.umq > 1) unidad = "juegos";
      }

      return "Cantidad por Envase: " + this.item.umq + " " + unidad;
    },

    totalunidades(){

      if(this.item.umq > 1 && this.item.cantidad > 1 ){

        return this.item.umq * this.item.cantidad
      }
    },
    itemGet() {
      
    }
  },
  methods: {
    ...mapActions(["modifyBasket"]),
    toBasket(e) {
      this.toChange += e.target.value - this.item.cantidad;
      //console.log(this.item);
      if (!this.awaitingSearch) {
        setTimeout(() => {
          this.modifyBasket([
            {
              id: this.item.id,
              quantity: this.toChange,
              is_combo: false,
              is_oferta: this.item.is_promo,
              usa_puntos: this.item.usa_puntos
            }
          ]).catch(err => console.log(err));

          this.awaitingSearch = false;
          this.toChange = 0;
          location.reload();

        }, 1000); // 1 sec delay
      }
      this.awaitingSearch = true;

    },
  },
  
  mounted() {
    //console.log("ITEM:", this.item);
    
  },
};
</script>


<style scoped lang='scss'>
.promo {
  color: green;
}
.producto_data {
  position: relative;
  .label {
    position: absolute;
    top: 35px;
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
