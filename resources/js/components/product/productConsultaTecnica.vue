<template>
  <vue-modal :size="'md'" @close="$emit('close')">
    <template slot="title"><h4>Ficha Técnica de la marca {{marca_nombre}} y el modelo {{modelo_nombre}}</h4></template>
    <template slot="body">
      <div class="container" id="index">

        <data-table
            :data="data"
            :columns="columns"
            @on-table-props-changed="reloadTable">

          <div slot="filters" slot-scope="">
          </div>
          <div slot="pagination" slot-scope="{ links = {}, meta = {} }">

          </div>
        </data-table>
  </div>
</template>
</vue-modal>
</template>
<style>
.popover {
  z-index: 99999!important;
}
.modal-body{
  height: 420px;
  overflow:auto;
}
.asc {
  background: url(/public/images/asc.png) right center no-repeat;
}

.desc {
  background: url(/public/images/desc.png) right center no-repeat;
}

.row {
  margin-left: 10px;
}

.results .btn {
  margin-right: 10px;
}

.results img {
  margin-right: 10px;
}

.results .form-group {
  float: none;
  margin-bottom: -12px;
}

.alert p {
  color: #000;
}
#resultado{
  height: 600px;
  width: 100%;
  overflow: auto;
}
</style>
<script>
import { mapActions, mapGetters } from "vuex";
import articulos from "./ctarticulos"

export default {
  data() {
    return {
      isDisable:false,
      showAddRow:false,
      addRowPlus:false,
      marca_nombre:null,
      modelo_nombre:null,

      data:{},
      tableProps: {
        length: 100,

      },
      filters: {
        isActive: null,
      },
      columns: [
        {
          label: 'TipoParte',
          name: 'tipo_partes.nombre',
          orderable: false,
        },
        {
          label: 'Valores',
          name: 'value',
          orderable: false,
        },

        {
          label: 'articulos',
          name: 'articulos',
          component: articulos,
          orderable: false,
        },
      ],
    };
  },
  props:['datos'],
  mounted() {
    this.getCtecnica(this.datos);
    this.marca_nombre = this.datos.marca.marca
    this.modelo_nombre = this.datos.modelo.modelo
  },
  computed: {
    ...mapGetters(["partes","tpartes", "marcas", "modelos"]),
    busquedaValida() {
      return (
          this.form.marca ||
          this.form.modelo ||
          this.form.search
      );
    },


  },
  components: {
    articulos
  },

  methods: {
    ...mapActions(["getPartes", "getTpartes", "getMarcas", "getModelos"]),
    getModelo(marca) {
      if (!marca) {
        this.getModelos(null);
        this.resetForm();
      } else {
        this.getModelos(marca.id);


      }
    },
    isMobile() {
      if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        return true
      } else {
        return false
      }
    },
    getCtecnica(form) {
      //console.log(form.marca);
      if(!form.marca|| !form.modelo){
        this.constecnica=false;
        this.$noty.error('Antes de  debe elegir una marca y modelo');
        this.resetForm();
        return false;
      }


      let url = "/api/admin/ctecnica/"+form.marca.id+"/"+form.modelo.id;
      axios
          .get(url,{params:this.tableProps})
          .then(res => {
            //console.log(res.data)
            this.data  = res.data

            this.constecnica=true;

          })
          .catch(err => this.showError(err));

    },
    reloadTable() {
      this.form.producto=null;
      this.form.tpartes=null;
      this.form.valor=null;
      //console.log(this.datos);
      let url = "/api/admin/ctecnica/"+this.datos.marca.id+"/"+this.datos.modelo.id;
      let parte_datos= {'marca_id':this.datos.marca.id,'id':this.datos.modelo.id}
      this.getTpartes(parte_datos);
      axios
          .get(url,{params:this.tableProps})
          .then(res => {
            //console.log(res.data)
            this.data  = res.data
            this.addRowPlus=true;
          })
          .catch(err => this.showError(err));

    },
    resetForm(){
      this.form.id= null;
      this.form.marca= null;
      this.form.modelo= null;
      this.form.producto=null;
      this.form.tpartes=null;
      this.form.valor=null;
    },
    close()
    {
      this.getData(this.url);
      this.activeOferta = null;
      $('#modal_box').modal('hide');
      $('.modal-backdrop').hide();
    }
  }
};
</script>
