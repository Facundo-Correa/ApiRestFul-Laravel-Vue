<template>
  <li class="list-group-item">
    <div class="row">
      <div class="col-4">
        ID #{{item.id}}
        <br />
        <b>{{item.descripcion}}</b>
        <br />
        {{presentacion}}
        <br />

      </div>
      <div class="col-4">
        <b>Cantidad:</b>
        {{item.cantidad}}
        <br />
        <template v-if="item.precio > 0">
          <b>Precio:</b>
          ${{(item.precio*item.umq).toFixed(2)}}
          <!-- el umq es la cantidad que viene en el envase -->
          <br />
        </template>
        <template v-else>
          <b>Precio:</b>
          <b style="color:green">GRATIS</b>
          <br />
        </template>
        <template v-if="item.ahorro > 0">
          <b>Ahorro:</b>
          ${{(item.ahorro*item.umq).toFixed(2)}}
        </template>
      </div>
      <div class="col-4">
        <b>Total:</b>
        ${{(item.precio * item.cantidad * item.umq).toFixed(2)}}
        <br />

        <template v-if="item.ahorro > 0">
          <b>Total Ahorro:</b>
          ${{(item.ahorro * item.cantidad * item.umq).toFixed(2)}}
        </template>
      </div>
      <p class="alert alert-danger" v-if="item.umq >1 && totalunidades >1 ">Le recordamos que la cantidad indicada es por envase, si no esta seguro en comprar {{totalunidades}} unidades por favor regrese al paso anterior y modifique la cantidad.</p>

    </div>
    <div class="green">{{item.promo_desc}}</div>
  </li>
</template>

<script>
export default {
  props: ["item"],
  computed: {
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
    }
  },
  mounted() {
    //console.log(this.item);
  },
};
</script>

<style>
.green {
  color: green;
}
</style>
