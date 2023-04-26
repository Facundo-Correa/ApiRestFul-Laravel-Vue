<template>
  <div class="container" id="index">
    <h2>Gestor de Ofertas</h2>

    <data-table
        :data="data"
        :columns="columns"
        @on-table-props-changed="reloadTable">

      <div slot="filters" slot-scope="{ tableFilters, perPage }">
        <div class="row mb-2">
          <div class="col-md-4">
            <select class="form-control" v-model="tableFilters.length">
              <option :key="page" v-for="page in perPage">{{ page }}</option>
            </select>
          </div>
          <div class="col-md-4">
            <add :accion="accion"  @closeDialog="close"></add>
          </div>
          <div class="col-md-4">
            <input
                name="name"
                class="form-control"
                v-model="tableFilters.search"
                placeholder="Search Table">
          </div>
        </div>
      </div>
    </data-table>
    <ofertas-modal v-if="activeOferta" :item="item" @closeDialog="close"></ofertas-modal>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import addButton from "../buttons/add";
import editButton from "../buttons/editar";
import deleteButton from "../buttons/borrar";
import Add from "../buttons/add";
export default {
  data() {
    return {
      activeOferta:null,
      item:null,
      accion:{
        'label':'Agregar Ofertas',
        'event': this.add

      },
      url: "api/admin/admofertas/",
      data: {},
      tableProps: {
        length: 10,
        dir: 'DESC'
      },
      filters: {
        isActive: null,
      },
      columns: [
        {
          label: 'ID',
          name: 'id',
          orderable: true,
        },
        {
          label: 'Código',
          name: 'codigo',
          orderable: true,
        },
        {
          label: 'Nombre',
          name: 'nombre',
          orderable: false,
        },
        {
          label: 'Descripcion',
          name: 'descripcion',
          orderable: false,
        },
        {
          label: 'Desde',
          name: 'desde',
          orderable: false,
        },
        {
          label: 'Hasta',
          name: 'hasta',
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

    }
  },
  computed: {
    ...mapGetters([ "isLoggedIn", "getUser"]),
    busquedaValida() {
      return (
          this.form.nombre ||
          this.form.email
      );
    }
  },
  components: {
    Add,
    // eslint-disable-next-line
    editButton,
    deleteButton
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
    this.getData(this.url);
  },
  methods: {
    getData(url = this.url,  options = this.tableProps) {
      //console.log("OPTIONS: ");
      //console.log(options);
      axios.get(url, {params:options})
          .then(response => {
            // || console.log(response.data);
            this.data = response.data;
          })
          // eslint-disable-next-line
          .catch(errors => {
            //Handle Errors

          })
    },
    reloadTable(tableProps) {
       this.getData(this.url, tableProps);
    },
    add() {
      this.activeOferta=true;
      this.item = {id:0};

    },
    editar(data) {
      this.activeOferta=true;
      this.item=data;

    },
    borrar(data) {
        axios
          .delete('/api/admin/admofertas/'+data.id)
          .then(res => {
            this.$noty.success(res.data.data)
            this.close();

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
  },
}
</script>
