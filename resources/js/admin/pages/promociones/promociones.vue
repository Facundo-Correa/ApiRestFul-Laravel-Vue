<template>
  <data-table
      :data="data"
      :columns="columns"
      @on-table-props-changed="reloadTable">
  </data-table>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import ExampleButton from './botonesPromociones';
export default {
  data() {
    return {
      url: "api/admin/promociones/",
      data: {},
      tableProps: {
        length: 10,

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
          label: 'Acciones',
          name: 'acciones',
          orderable: false,
          classes: {
            'btn': true,
            'btn-primary': true,
            'btn-sm': true,
          },
          event: "click",
          handler: this.displayRow,
          component: ExampleButton,
        },
      ]
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
    // eslint-disable-next-line
    ExampleButton,
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
      axios.get(url, {params:options})
          .then(response => {
            //console.log(response.data);
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

    displayRow(data) {
      alert(`You clicked row ${data.id}`);
    },
  },
}
</script>