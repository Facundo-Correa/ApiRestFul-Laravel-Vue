<template>
  <div class="container" id="index">
    <h3>Articulos sustitutos</h3>
    <br>
    <div id='my_alert'></div>
    <div class="container" style="">
      <div class="row" style="width: 100%;">
        <div class="col-3 col-sm-4">
          <input type="hidden" v-model="form.id"/>

        </div>
      </div>
    </div>
    <div class="container" style="" >

      <div class="row" style="width: 100%;">
        <div class="col-3 col-sm-5">
          <div class="form-group" style="">
            <v-select
                taggable
                class="mb-3"
                v-model="form.articulo"
                :options="productos"
                label="descripcion"
                placeholder="Ingresar nombre de articulo a relacionar"
                @search="ajaxFindProduct"
            >
                            <span slot="no-options" @click="$refs.select.open = false">
                              Ingresar nombre de articulo a relacionar
                             </span>
            </v-select>
          </div>
        </div>
        <div class="col-3 col-sm-5">
          <div class="form-group" style="">
            <v-select
                taggable
                multiple
                class="mb-3"
                v-model="form.producto"
                :options="productos"
                label="descripcion"
                placeholder="Ingresar nombre o descripción del articulo sustituto"
                @search="ajaxFindProduct"
            >
                            <span slot="no-options" @click="$refs.select.open = false">
                              Ingresar nombre o descripción del articulo sustituto
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
      <div slot="filters" slot-scope="{ tableFilters, perPage }">
        <div class="row mb-2">


          <div class="col-md-4">
            <input
                name="name"
                class="form-control"
                v-model="tableFilters.search"
                placeholder="Buscar en la tabla">
          </div>
        </div>
      </div>

      <div slot="pagination" slot-scope="{ links = {}, meta = {} }">

      </div>

    </data-table>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import editButton from "../buttons/editar";
import deleteButton from "../buttons/borrar";
import Add from "../buttons/add";
import articulos from "../consultatecnica/articulos"

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
      url : "/api/admin/artrel/",
      data: {},
      tableProps: {
        search:'',
        length: 10000,
        per_page:1000,
        column:'',
        dir:''
      },

      columns: [
        {
          label: 'Articulo',
          name: 'id_articulo',
          orderable: true,
        },

        {
          label: 'Sustitutos',
          name: 'productos',
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

  computed: {
    ...mapGetters([ "isLoggedIn", "getUser"]),
  },
  components: {
    Add,
    // eslint-disable-next-line
    editButton,
    deleteButton,
    articulos
  },
  mounted() {
    setTimeout(() => {
      if (this.getUser.role != 'admin_admin') {
        this.$noty.error("No posee permisos suficientes para ingresar.");
        this.$router.push({ name: "home" });
      }
    }, 500);
    // this.getClientes();
  },
  created() {
    this.getData();
  },
  methods: {
    isMobile() {
      if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        return true
      } else {
        return false
      }
    },
    getData(url = this.url,  options = this.tableProps){
      axios
          .get(url,{params:options})
          .then(res => {
            //console.log(res.data)
            this.data  = res.data

          })
          .catch(err => this.showError(err));

    },
    reloadTable(tableProps) {
      this.getData(this.url, tableProps);
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
    add() {
      let url =  '/api/admin/artrel/store';
      axios
          .post(url, this.form)
          .then(res => {
            this.$noty.success(res.data.data)
            this.resetForm();
            this.reloadTable(this.tableProps);
            this.isDisable= false;
          })
          .catch(this.showError)
    },
    editar(data) {
      this.form.producto=data.articulos;
      this.form.articulo=data.id_articulo;
      this.form.id= data.id_articulo;

      this.reloadTable(this.tableProps);
    },
    borrar(data) {
      //console.log(data);
      axios
          .delete('/api/admin/artrel/'+data.id_articulo)
          .then(res => {
            this.$noty.success(res.data.data);
            this.reloadTable(this.tableProps);
          })
          .catch(this.showError)
    },
    resetForm(){
      this.form.articulo=null;
      this.form.producto=null;
      this.form.id=null;
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
