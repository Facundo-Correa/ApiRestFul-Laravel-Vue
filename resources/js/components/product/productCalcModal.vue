<template>
  <vue-modal @close="close" ref="modal" size="sm">
    <template slot="title">Calcular valor de venta de {{producto.nombre}}</template>
    <template slot="body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" readonly v-model="precio" />
          </div>
          <div class="form-group">
            <label class="form-label">Precio + IVA</label>
            <input type="text" class="form-control" readonly v-model="precioIva" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Margen %</label>
            <input type="text" class="form-control" v-model="margin"  />
          </div>
          <div class="form-group">
            <label class="form-label">Precio Venta</label>
            <input type="text" class="form-control" readonly v-model="precioVenta" />
          </div>
        </div>
      </div>
    </template>
    <template slot="footer">
      <div class="col-md-6">
        <div class="input-group">
          <input type="number" class="form-control" v-model="quantity" />
          <div class="input-group-append">
              <a class="btn btn-primary" title="Agregar al Carrito" @click="toBasket">
              <i class="fa fa-shopping-cart"></i>
            </a>
          </div>
        </div>
      </div>
    </template>
  </vue-modal>
</template>

<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      margin: 0,
      quantity: 1
    };
  },
  props: ["producto"],
  computed: {
    precio() {
      if (this.producto.precio_total) {
        return this.producto.precio_total.toFixed(2);
      }
      return this.producto.precio_actual.toFixed(2);
    },
    precioIva() {
      if (this.producto.precio_total) {
        return (this.producto.precio_total * 1.21).toFixed(2);
      }
      return (this.producto.precio_actual * 1.21).toFixed(2);
    },
    precioVenta() {
      if (this.producto.precio_total) {
        return (
          this.producto.precio_total *
          1.21 *
          (this.margin / 100 + 1)
        ).toFixed(2);
      }
      return (
        this.producto.precio_actual *
        1.21 *
        (this.margin / 100 + 1)
      ).toFixed(2);
    }
  },
  methods: {
    ...mapActions(["modifyBasket"]),
    close() {
      this.$emit("close");
    },
    toBasket() {
      this.modifyBasket([
        {
          id: this.producto.id,
          quantity: this.quantity,
          is_combo: false,
          usa_puntos: false,

        }
      ])
        .then(res => this.$noty.success(res.data.data))
        .catch(err => console.log(err));
    }
  }
};
</script>

<style scoped>
</style>
