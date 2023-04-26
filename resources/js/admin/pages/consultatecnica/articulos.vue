<template>
  <div>

      <span v-for="producto in data.articulos" :key="data.articulos.id" class="d-inline-block"  >
          <span class="badge badge-pill badge-info" tabindex="0"  data-bs-toggle="popover" :data-target='producto.id' @mouseover="showpop(producto.id)">{{ producto.id }}</span>
        <div :id='producto.id'  class="hide" >
          <div class="media-body row">
            <div class="col-sm-6">
              <img class="center-block" :alt=producto.nombre :src='producto.image_thumb'>
            </div>
            <div class="col-sm-6">
              <h4 class="media-heading"><b>{{ producto.nombre }}</b></h4>
            </div>
          </div>
        </div>
      </span>

  </div>
</template>
<style>
.hide{
  display: block;
}
</style>
<script>
export default {
data(){
  return {
    id:null
  }
},
props: {
    data: {},
    articulos: {}
  },
  methods: {
    showpop(product) {

      $('[data-bs-toggle="popover"]').popover({
        placement: 'auto',
        trigger: 'focus',
        html: true,
        content: function() {
          var contentSelector = $(this).data("target");
          //console.log(contentSelector)
          if (contentSelector && $(contentSelector).length > 0) {

            return   $("#"+contentSelector).html();
          }
        }
        });
    }
  }
}
</script>
