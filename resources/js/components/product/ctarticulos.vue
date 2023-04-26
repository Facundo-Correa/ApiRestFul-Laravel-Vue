<template>
  <div>
      <span v-for="producto in data.articulos" :key="data.articulos.id"   >
          <span class="badge badge-pill badge-info pastilla" tabindex="5"  data-bs-toggle="popover"  :data-title="producto.nombre" @click="showMod(producto)">{{ producto.id }}</span>

      </span>
    <ctecnicaProductModal v-if="showModal" @close="showModal=false"  :producto="producto" />

  </div>
</template>
<style>
.hide{
  display: none;
}
.popover {
  z-index: 99999!important;

}
.pastilla{
  cursor:pointer;
}
</style>
<script>
import productMixin from "../../mixins/productMixin";
import mobileChecker from "../../mixins/mobileChecker";
import {mapActions} from "vuex";

export default {
  mixins: [mobileChecker],
data(){
  return {
    id:null,
    qtyCart:1,
    showModal:null
  }
},
props: {
    data: {},
    articulos: {}
  },
  methods: {
    ...mapActions(["modifyBasket"]),

    toBasket() {
      //console.log('ingreso a modif basket')
      $('[data-bs-toggle="popover"]').popover().close();
      this.modifyBasket([
        {
          id: this.producto.id,
          quantity: this.qtyCart,
          is_combo: false,
          usa_puntos: false,
            is_oferta: this.producto.is_promo

        }
      ])
          .then(res => {
            //console.log(res.data.data.status);
            switch (res.data.data.status) {
              case 205:

                this.$noty.warning(res.data.data.data,{
                  layout: 'center',
                  timeout:25000,
                });
                break;
              default:
                this.$noty.success(res.data.data.data)
                break;
            }

          })
          .catch(err => {
            var msg='Este producto ya lo agrego a su lista de alerta de stock.' +
                ' Le recordamos que los productos sin stock o por pedido solo se pueden agregar una vez y se' +
                ' notificara por mail cuando estos ingresen al stock. GRACAIS!!';

            if(err.response.data.message.includes('1062') == false)
              msg=err.message;

            this.$noty.error(msg,{
              timeout:25000,
              layout:'topCenter'
            })

          });

    },
    showMod(producto){
      this.producto=producto;
      this.showModal = true;
    },
    showpop(product) {

      $('[data-bs-toggle="popover"]').popover({
        placement: 'right',
        trigger: 'click',
        html: true,
        toggle:true,
        sanitize:false,
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
