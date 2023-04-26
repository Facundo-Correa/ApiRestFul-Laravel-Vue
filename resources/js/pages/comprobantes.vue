<template>
  <div>
    <div class="container">
      <a hidden id="tmplink" href="https://google.com"></a>
      <h2>Comprobantes subidos</h2>
      <br />
      <data-table
        :data="data"
        :columns="columns"
        @on-table-props-changed="reloadTable"
      >
        <div slot="filters" slot-scope="{ tableFilters, perPage }">
          <div class="row mb-2">
            <div class="col-md-4">
              <select class="form-control" v-model="tableFilters.length">
                <option :key="page" v-for="page in perPage">{{ page }}</option>
              </select>

              <button
                @click="eliminar"
                type="button"
                class="btn btn-danger"
                style="margin-top: 10px"
              >
                Eliminar
              </button>
            </div>
            <div class="col-md-4">
              <!--<add :accion="accion" @closeDialog="close"></add>-->
            </div>
            <div class="col-md-4">
              <input
                name="name"
                class="form-control"
                v-model="tableFilters.search"
                placeholder="Buscar comprobante"
              />

              <div style="float: right; margin: 10px; margin-right: 0">
                <button
                  type="button"
                  class="btn btn-outline-secondary"
                  @click="previousPage"
                >
                  Anterior
                </button>
                <button
                  type="button"
                  class="btn btn-outline-secondary"
                  @click="nextPage"
                >
                  Siguiente
                </button>
              </div>
            </div>
          </div>
        </div>
      </data-table>
    </div>
  </div>
</template>

<script>
import checkbox from "../admin/pages/buttons/checkbox.vue";
import enviarButton from "../admin/pages/buttons/enviar.vue";
import descargarButton from "../admin/pages/buttons/descargar.vue";
import axios from "axios";
export default {
  mounted() {
    this.getAllComprobantes();
  },
  data() {
    return {
      current: 0,
      total: [],
      info: [],
      selected: [],
      n_plataforma: "",
      data: {},
      tableProps: {
        length: 10,
        column: "id",
        dir: "DESC",
        search: "",
      },
      filters: {
        isActive: null,
      },
      columns: [
        {
          label: "Seleccionar",
          name: "Seleccionar",
          orderable: false,
          event: "click",
          handler: this.selectfunc,
          component: checkbox,
        },
        {
          label: "ID",
          name: "ID",
          orderable: true,
        },
        {
          label: "Fecha",
          name: "Year",
          orderable: true,
        },
        {
          label: "Nro. de plataforma",
          name: "Plattform",
          orderable: false,
        },
        {
          label: "Nombre",
          name: "Name",
          orderable: false,
        },
        {
          label: "Descargar",
          name: "Descargar",
          orderable: false,
          classes: {
            btn: true,
            "btn-success": true,
            "btn-sm": true,
            "btn-cls": true,
          },

          event: "click",
          handler: this.descargar,
          component: descargarButton,
        },
        /*{
          label: "Enviar por mail",
          name: "",
          orderable: false,
          classes: {
            btn: true,
            "btn-primary": true,
            "btn-sm": true,
            "btn-env": true
          },
          event: "click",
          handler: this.enviar,
          component: enviarButton,
        },*/
      ],
    };
  },
  methods: {
    selectfunc(data) {
      if (this.selected.includes(data.ID)) {
        let index = this.selected.indexOf(data.ID, 0);
        this.selected.splice(index, 1);
      } else {
        this.selected.push(data.ID);
      }
    },
    getAllComprobantes() {
      let self = this;

      axios.post("/api/all-comprobantes").then(function (response) {
        let d = response.data.data;
        if (d) {
          d.map(function (item) {
            self.info.push(item);
          });
        }
      });

      self.total = {
        data: self.info,
      };
      self.reloadTable(this.tableProps);
    },
    getYears() {
      let self = this;
      axios.post("/api/years").then(function (response) {
        self.years = response.data.data;
      });
    },
    // || Obteniendo los comprobantes mediante año y email || //
    /*getComprobantes() {
      this.info = [];

      let self = this;
      let busqueda = {
        año: self.año,
        mes: self.mes,
        dia: self.dia,
        plataforma: self.n_plataforma,
      };
      axios.post("/api/comprobantes", busqueda).then(function (response) {
        self.info = response.data.data;

        //console.log(self.info);
      });
    },*/
    enviarComprobante(path, email) {
      //console.log(email);
      // || En caso de necesitar mas información al enviar el comprobante por mail, modificar  || //
      // || getComprobantes() y el comprobanteController@get de Laravel.                       || //
      let comprobante = {
        email: this.email_destino,
        path: path,
        user: email,
      };
      axios
        .post("/api/enviar-comprobante", comprobante)
        .then(function (response) {
          // || Emision del comprobante al servidor || //
        });
    },
    eliminar() {
      let self = this;
      axios
        .post("/api/eliminar-comprobantes", {
          ids: self.selected,
        })
        .then(function (response) {
          self.reloadTable(self.tableProps);
          self.selected = [];

          let checks = document.getElementsByClassName("form-check-input");
          for (let check of checks) {
            check.checked = false;
          }
        });
    },

    descargar(data) {
      // En caso de querer usar POST, queda esto ya preparado.
      /*let self = this;
      
      let form = document.createElement("form");
      form.setAttribute("method", "POST");
      form.setAttribute("action", "/api/descargar/" + data.ID);
      form.setAttribute("style", "visibility:hidden;");
      let button = document.createElement("input");
      button.setAttribute("type", "submit");
      button.setAttribute("style", "visibility:hidden;");
      form.appendChild(button);
      document.body.appendChild(form);
      form.submit();
      
      button.remove();
      form.remove();
      */
    },
    reloadTable(props) {
      let self = this;
      axios
        .post("/api/comprobantes", {
          options: props,
        })
        .then(function (response) {
          self.info = response.data.data;
          self.total = {
            data: self.info,
          };

          self.loadData(props);
        });
    },

    loadData(props) {
      this.tableProps = props;
      let self = this;
      let data = [];
      let longitud = parseInt(props["length"]);
      for (
        let i = longitud * self.current;
        i < longitud * self.current + longitud;
        i++
      ) {
        if (self.total.data[i]) {
          data.push(self.total.data[i]);
        }
      }
      self.data = {
        data: data,
      };
    },
    nextPage() {
      if (this.length / this.data.length > this.current) {
        this.current++;
        this.loadData(this.tableProps);
      }
    },
    previousPage() {
      if (this.current > 0) {
        this.current--;
        this.loadData(this.tableProps);
      }
    },
  },
};
</script>

<style>
.pagination {
  display: none;
}
</style>