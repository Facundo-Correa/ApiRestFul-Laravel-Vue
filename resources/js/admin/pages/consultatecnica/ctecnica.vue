<template>
  <div class="container" id="index">
    <h3>Consulta Técnica</h3>
  <br>
    <div id='my_alert'></div>
    <div class="container" style="">
      <div class="row" style="width: 100%;">
        <div class="col-3 col-sm-4">
          <input type="hidden" v-model="form.id"/>

            <v-select
                class="mb-3"
                :options="marcas"
                v-model="form.marca"
                @input="getModelo"
                label="marca"
                placeholder="Marcas"
                :disabled="isDisable"
            >
                <span slot="no-options" @click="$refs.select.open = false">
                    No hay Marcas
                </span>
            </v-select>

        </div>
        <div class="col-3 col-sm-4">
            <v-select
                class="mb-3"
                :options="modelos"
                v-model="form.modelo"
                @input="getCtecnica"
                label="modelo"
                placeholder="Modelos"
                :disabled="isDisable"
            >
                <span slot="no-options" @click="$refs.select.open = false">
                    Elija una marca primero
                </span>
            </v-select>

        </div>
        <div class="col-3 col-sm-4" v-if="addRowPlus">
          <button class="btn btn-primary btn-success" @click='show'><span class="fa fa-plus"></span></button>
        </div>
      </div>

    </div>
    <div class="container" style="" v-if='showAddRow'>
      <div class="row" style="width: 100%;">
        <div class="col-3 col-sm-4">
          <div class="form-group" style="">
            <v-select
                class="mb-3"
                :options="tpartes"
                v-model="form.tpartes"
                label="nombre"
                track-by="id"
                placeholder="Tipo de Parte"
                :disabled="isDisable"
            >
                <span slot="no-options" @click="$refs.select.open = false">
                    Elija un tipo de parte
                </span>
            </v-select>
          </div>
        </div>
        <div class="col-3 col-sm-6">
          <div class="form-group" style="">
            <input type="text" class="form-control" placeholder="Valor" v-model="form.valor">
          </div>

        </div>
      </div>
      <div class="row" style="width: 100%;">
        <div class="col-3 col-sm-10">
          <div class="form-group" style="">
            <v-select
                taggable
                multiple
                class="mb-3"
                v-model="form.producto"
                :options="productos"
                label="descripcion"
                placeholder="Ingrese codigo de producto"
                @search="ajaxFindProduct"
            >
                            <span slot="no-options" @click="$refs.select.open = false">
                              Ingresar nombre o descripción del producto
                             </span>
            </v-select>
          </div>
        </div>
        <div class="col-3 col-sm-2"  >
          <button class="btn btn-primary btn-success" @click='add'><span class="fa fa-check"></span></button>
        </div>
      </div>

    </div>
    <data-table
        :data="data"
        :columns="columns"
        @on-table-props-changed="reloadTable">

      <div slot="filters" slot-scope="">


      </div>
    </data-table>
  </div>
</template>
<style>

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
import editButton from "../buttons/editar";
import deleteButton from "../buttons/borrar";
import Add from "../buttons/add";
import articulos from "./articulos"

export default {
  data() {
    return {
      isDisable:false,
      showAddRow:false,
      addRowPlus:false,
      productos: [],
      form: {
        id:null,
        producto:null,
        valor:null,
        tparte:null,
        marca: null,
        modelo: null,
        search: null,
        searchCods: null
      },
      accion:{
        'label':'Agregar Ofertas',
        'event': this.add

      },
      data: {},
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

        {
          label: 'Editar',
          name: 'Editar',
          orderable: false,
          classes: {
            'btn': true,
            'btn-success': true,
            'btn-sm': true,
          },
          event: "click",
          handler: this.editar,
          component: editButton,
        },
        {
          label: 'Borrar',
          name: 'Borrar',
          orderable: false,
          classes: {
            'btn': true,
            'btn-danger': true,
            'btn-sm': true,
          },
          event: "click",
          handler: this.borrar,
          component: deleteButton,
        },
      ],
    };
  },
  mounted() {
     if (!this.marcas.length) {
      this.getMarcas();
    }

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
    Add,
    // eslint-disable-next-line
    editButton,
    deleteButton,
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
    getCtecnica(datos) {
      //console.log(datos);
      if(!datos.marca_id || !datos.id){
        this.showAddRow=false;
        this.addRowPlus=false;
        this.resetForm();
        return false;
      }

      this.getTpartes(datos);

      let url = "/api/admin/ctecnica/"+datos.marca_id+"/"+datos.id;
      axios
          .get(url,{params:this.tableProps})
          .then(res => {
              //console.log(res.data)
              this.data  = res.data
            this.addRowPlus=true;
          })
          .catch(err => this.showError(err));

    },
    reloadTable(datos) {
      this.form.producto=null;
      this.form.tpartes=null;
      this.form.valor=null;
      //console.log(datos);
      let url = "/api/admin/ctecnica/"+datos.marca.id+"/"+datos.modelo.id;
      let parte_datos= {'marca_id':datos.marca.id,'id':datos.modelo.id}
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
    ajaxFindProduct(query) {

      if (query && query.length >= 3) {

        let url = "/api/producto/busqueda?id="+query;
        axios
            .get(url)
            .then(res => {
              this.productos = res.data.data;
              //this.form.search = query;
            })
            .catch(err => this.showError(err))
        ;
      }
    },
    onBusqueda() {
      if (!this.busquedaValida)
        this.$noty.error("Debe seleccionar algun criterio de busqueda.");
      else
        this.$emit("onSearch", {
          filters: {
            parte_id: this.form.parte ? this.form.parte.id : null,
            marca_id: this.form.marca ? this.form.marca.id : null,
            modelo_id: this.form.modelo ? this.form.modelo.id : null,
            id:
                this.form.search && typeof this.form.search === "object"
                    ? this.form.search.id
                    : null,
            search:
                typeof this.form.search === "string" ? this.form.search : null,
            searchCods: this.form.searchCods ? this.form.searchCods : null
          },
          done: () => {
            this.form = {
              parte: null,
              marca: null,
              modelo: null,
              search: null,
              searchCods: null,

            }
            this.filters=null
          }
        });
    },
    resetForm(){
      this.form.id= null;
      this.form.marca= null;
      this.form.modelo= null;
      this.form.producto=null;
      this.form.tpartes=null;
      this.form.valor=null;
    },
    show() {

      if (!this.form.marca || !this.form.modelo) {
        this.resetForm();
        this.$noty.error('Antes de agregar debe elegir una marca y modelo');
      } else {
       this.showAddRow = true;
        //console.log('je');
      }
    },
    add() {
      let url =  '/api/admin/ctecnica/store';

      axios
          .post(url, this.form)
          .then(res => {
            this.$noty.success(res.data.data)
            this.reloadTable(this.form);
            this.isDisable= false;
          })
          .catch(this.showError)
    },
    editar(data) {
      this.isDisable=true;
      this.showAddRow = true;
      //console.log(data)
      this.form.producto=data.articulos;
      this.form.tpartes=data.tipo_partes;
      this.form.valor=data.value;
      this.form.id= data.id;
      this.showAddRow = true;
    },
    borrar(data) {
      axios
          .delete('/api/admin/ctecnica/'+data.id)
          .then(res => {
            this.$noty.success(res.data.data);
            this.reloadTable(this.form);


          })
          .catch(this.showError)
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
