<template>
  <div>
    <!-- modal area start-->
    <div
      ref="modal"
      class="modal fade"
      id="modal_box"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
      v-if="item"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <!--|| Cierre del modal ||-->
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
            @click="$emit('closeDialog')"
          >
            <span aria-hidden="true">&times;</span>
          </button>

          <div class="modal_body">
            <form
              @submit.prevent="save"
              action
              method="post"
              id="formRegistro"
              role="form"
              class="form"
            >
              <input type="hidden" name="id" value="item.id" />
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <!--|| Primer paso ||-->
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="text-info">
                          <b>Paso 1:</b> Datos de la Oferta {{ item.id }}
                        </h3>
                        <div class="row">
                          <!-- || Codigo y nombre || -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="text">Codigo</label>

                              <!--|| Codigo auto generado ||-->
                              <input
                                v-model="form.codigo"
                                type="text"
                                class="form-control span12"
                                id="codigo"
                                name="codigo"
                                placeholder=""
                                readonly
                              />
                            </div>
                            <div class="form-group">
                              <label class="text">Nombre</label>
                              <input
                                v-model="form.nombre"
                                type="text"
                                class="form-control span12"
                                id="nombre"
                                name="nombre"
                                placeholder="Ingrese Nombre"
                              />
                            </div>
                          </div>

                          <!-- || Desde y Hasta || -->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="text">Desde</label>
                              <input
                                v-model="form.desde"
                                type="Date"
                                class="form-control span12"
                                id="desde"
                                name="desde"
                                placeholder="Ingrese Inicio Oferta"
                              />
                            </div>
                            <div class="form-group">
                              <label class="text">Hasta</label>
                              <input
                                v-model="form.hasta"
                                type="Date"
                                class="form-control span12"
                                id="hasta"
                                name="hasta"
                                placeholder="Ingrese Fin de Oferta"
                              />
                            </div>
                          </div>

                          <!-- || Descripcion || -->
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="text">Descripcion</label>
                              <input
                                v-model="form.descripcion"
                                type="text"
                                class="form-control span12"
                                id="descripcion"
                                name="descripcion"
                                placeholder="Ingrese una descripción "
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--|| Segundo paso ||-->
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="text-info">
                          <b>Paso 2: </b>
                          <span v-if="item.id == 0">Defina el Criterio</span>
                          <span v-if="item.id > 0">Criterio configurado</span>
                        </h3>

                        <!-- || Tipo Criterios || -->
                        <div class="row">
                          <!-- || Por fecha || -->
                          <div class="col-md-6" v-if="item.id === 0">
                            <div class="form-group">
                              <label class="text">Por Fecha</label>
                              <input
                                type="radio"
                                name="criterio"
                                value="1"
                                v-model="form.id_tipo_criterio"
                              />
                            </div>
                          </div>

                          <!-- || Por usuario || -->
                          <div class="col-md-6" v-if="item.id === 0">
                            <div class="form-group">
                              <label class="text"> Por Usuario</label>
                              <input
                                type="radio"
                                name="criterio"
                                value="2"
                                v-model="form.id_tipo_criterio"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row" v-if="this.form.id_tipo_criterio > 0">
                          <div
                            class="col-md-12"
                            v-show="form.id_tipo_criterio === '1'"
                          >
                            <div class="col-md-12" v-if="item.id > 0">
                              <div>
                                <ul>
                                  <li>
                                    <b>Dia/s</b>:<span>{{
                                      this.form.cDia
                                    }}</span>
                                  </li>
                                  <li>
                                    <b>Semana/s:</b
                                    ><span>{{ this.form.cSemana }}</span>
                                  </li>
                                  <li>
                                    <b>Mes/es:</b
                                    ><span>{{ this.form.cMes }}</span>
                                  </li>
                                </ul>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="text">Dia de la Semana</label>
                                <v-select
                                  id="dselect"
                                  :disabled="form.id_tipo_criterio === '2'"
                                  class="mb-3"
                                  v-model="form.dsemana"
                                  :options="dsemana"
                                  item-value="id"
                                  item-text="nombre"
                                  label="nombre"
                                  placeholder="Elija un día"
                                />
                              </div>

                              <div class="form-group">
                                <label class="text">Semana</label>
                                <v-select
                                  :disabled="form.id_tipo_criterio === '2'"
                                  class="mb-3"
                                  v-model="form.semana"
                                  :options="semana"
                                  label="nombre"
                                  placeholder="Elija una Semana"
                                />
                              </div>

                              <div class="form-group">
                                <label class="text">Mes</label>
                                <v-select
                                  :disabled="form.id_tipo_criterio === '2'"
                                  class="mb-3"
                                  v-model="form.mes"
                                  :options="mes"
                                  label="nombre"
                                  placeholder="Elija un Mes"
                                />
                              </div>
                            </div>
                          </div>

                          <div
                            class="col-md-12"
                            v-show="form.id_tipo_criterio === '2'"
                          >
                            <div class="col-md-12" v-if="item.id > 0">
                              <div>
                                <ul>
                                  <li>
                                    <b>Usuario: </b
                                    ><span
                                      v-for="usuario in form.relaciones
                                        .usuarios"
                                      :key="usuario.usuario"
                                      >{{ usuario }},
                                    </span>
                                  </li>
                                  <li>
                                    <b>Tipo de Usuario: </b
                                    ><span
                                      v-for="tusuario in form.relaciones
                                        .tipo_usuarios"
                                      :key="tusuario"
                                      >{{ tusuario }},
                                    </span>
                                  </li>
                                  <li>
                                    <b>Puntos: </b
                                    ><span>{{ form.puntos }}</span>
                                  </li>
                                  <li>
                                    <b>Ultima Compra: </b
                                    ><span>{{ form.ultima_compra }}</span>
                                  </li>
                                </ul>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="text">Usuario</label>
                                <v-select
                                  taggable
                                  multiple
                                  :disabled="form.id_tipo_criterio === '1'"
                                  class="mb-3"
                                  v-model="form.usuario"
                                  :options="usuarios"
                                  label="descripcion"
                                  placeholder="Elija un usuario"
                                  @search="ajaxFindUser"
                                >
                                  <span
                                    slot="no-options"
                                    @click="$refs.select.open = false"
                                  >
                                    Elija un usuario
                                  </span>
                                </v-select>
                              </div>
                              <div class="form-group">
                                <label class="text">Tipo Usuario</label>
                                <v-select
                                  :disabled="form.id_tipo_criterio === '1'"
                                  class="mb-3"
                                  v-model="form.tipo_usuario"
                                  :options="tipo_usuario"
                                  label="descripcion"
                                  placeholder="Elija un tipo de usuario"
                                  @input="getTipoUsuario"
                                />
                              </div>
                              <div class="form-group">
                                <label class="text">Minimo de Puntos</label>
                                <input
                                  :disabled="form.id_tipo_criterio === '1'"
                                  v-model="form.puntos"
                                  type="number"
                                  name="puntos"
                                  placeholder="Ingrese la cantidad minima de puntos"
                                  size="6"
                                />

                                <label class="text">Ultima Compra</label>
                                <input
                                  :disabled="form.id_tipo_criterio === '1'"
                                  v-model="form.ultima_compra"
                                  type="number"
                                  name="ultima_compra"
                                  placeholder="Ingrese el monto minimo de la ultima compra"
                                  size="6"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--|| Tercer paso ||-->
                    <div class="row">
                      <div class="col-md-12">
                        <h3 class="text-info">
                          <b>Paso 3: </b>Condiciones de la Oferta
                          <span v-if="item.id == 0"
                            >Condiciones de la Oferta</span
                          >
                          <span v-if="item.id > 0">Condición configurada</span>
                        </h3>
                        <div class="col-md-12" v-if="item.id > 0">
                          <div v-for="producto in form.relaciones.productos">
                            <p>
                              <b>Producto en oferta: </b
                              ><span>{{ producto.nombre }}</span> |
                              <!--<b>Cantidad minima: </b>{{ producto.cantidad }}-->
                            </p>
                          </div>
                          <div class="form-group col-mg-1">
                            <label class="text">Porcentaje de Descuento</label>
                            <input
                              type="number"
                              name="descuento_general"
                              v-model="form.descuento_gral"
                            />
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="text">Productos</label>
                            <v-select
                              class="mb-3"
                              v-model="form.producto"
                              :options="productos"
                              label="descripcion"
                              placeholder="Ingrese codigo de producto"
                              @search="ajaxFindProduct"
                            >
                              <span
                                slot="no-options"
                                @click="$refs.select.open = false"
                              >
                                Ingresar nombre o descripción del producto
                              </span>
                            </v-select>
                          </div>
                          <!--<div class="form-group col-mg-1">
                            <label class="text"
                              >Cantidad minima a comprar
                            </label>
                            <input
                              type="number"
                              size="4"
                              name="cantidad"
                              v-model="form.cantidad"
                            />
                          </div>-->
                          <span class="form-group col-mg-1" v-if="item.id == 0">
                            <label class="text">Porcentaje de Descuento</label>
                            <input
                              type="number"
                              name="descuento_general"
                              v-model="form.descuento_gral"
                            />
                          </span>

                          <span class="form-group col-mg-1">
                            <label class="text">Notificar en app</label>
                            <input
                              type="checkbox"
                              name="notificar"
                              v-model="form.notificar"
                              size="6"
                            />
                          </span>
                        </div>
                      </div>
                    </div>

                    <!--|| Grabado de ofertap ||-->
                    <div
                      class="row"
                      style="
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        width: 100%;
                        margin-left: 0;
                      "
                    >
                      <div
                        class="col-md-3"
                        style="
                          display: flex;
                          flex-direction: column;
                          align-items: center;
                          width: 100%;
                        "
                      ></div>
                      <div
                        class="col-md-3"
                        style="
                          display: flex;
                          flex-direction: column;
                          align-items: center;
                          width: 100%;
                        "
                      >
                        <button
                          type="submit"
                          class="btn btn-success btn-block"
                          v-if="item.id == 0"
                        >
                          Grabar Oferta
                        </button>

                        <div v-else style="width: fit-content">
                          <button
                            type="submit"
                            class="btn btn-primary btn-block"
                          >
                            Editar Oferta
                          </button>

                          <a
                            class="btn btn-primary btn-block"
                            @click="saveNewOffer()"
                          >
                            Guardar como nueva oferta
                          </a>
                        </div>
                      </div>
                      <div class="col-md-3"></div>
                      <div class="col-md-3"></div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- modal area end-->
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";

export default {
  data: function() {
    return {
      qtyCart: 1,
      dsemana: [
        { id: 8, nombre: "Sin Especificar" },
        { id: 7, nombre: "Domingo" },
        { id: 1, nombre: "Lunes" },
        { id: 2, nombre: "Martes" },
        { id: 3, nombre: "Miercoles" },
        { id: 4, nombre: "Jueves" },
        { id: 5, nombre: "Viernes" },
        { id: 6, nombre: "Sábado" },
      ],
      semana: [
        { id: 7, nombre: "Sin Especificar" },
        { id: 1, nombre: "Primer" },
        { id: 2, nombre: "Segunda" },
        { id: 3, nombre: "Tercera" },
        { id: 4, nombre: "Cuarta" },
        { id: 5, nombre: "Quinta" },
        { id: 6, nombre: "Sexta" },
      ],
      mes: [
        { id: 13, nombre: "Sin Especificar" },
        { id: 1, nombre: "Enero" },
        { id: 2, nombre: "Febrero" },
        { id: 3, nombre: "Marzo" },
        { id: 4, nombre: "Abril" },
        { id: 5, nombre: "Mayo" },
        { id: 6, nombre: "Junio" },
        { id: 7, nombre: "Julio" },
        { id: 8, nombre: "Agosto" },
        { id: 9, nombre: "Setiembre" },
        { id: 10, nombre: "Octubre" },
        { id: 11, nombre: "Noviembre" },
        { id: 12, nombre: "Diciembre" },
      ],
      mostrar: true,
      productos: [],
      usuarios: [],
      tipo_usuario: [],
      form: {
        codigo: null,
        nombre: null,
        desde: null,
        hasta: null,
        descripcion: null,
        dsemana: null,
        semana: null,
        mes: null,
        id_tipo_criterio: null,
        usuario: null,
        tipo_usuario: null,
        puntos: null,
        ultima_compra: null,
        producto: null,
        descuento_gral: null,
        notificar: null,
        relaciones: [
          {
            dias: null,
            semana: null,
            meses: null,
          },
        ],
        cDia: "",
        cMes: "",
        cSemana: "",
      },
    };
  },
  props: ["item"],
  computed: {
    ...mapGetters(["isLoggedIn"]),
  },
  mounted() {
    // || console.log(this.item);
    if (this.form.criterio === 2) this.mostrar = false;
    if (!this.form.tipo_usuario) {
      this.getTipoUsuario();
    }
    if (this.item.id > 0) {
      this.getOferta(this.item);
      //console.log(this.form);
    }

    // || Generación de codigo automatico || //
    if (this.item.id == 0) {
      // || Si el item id == 0: item nuevo
      this.generateCode();
    }



    //console.log(this.form);
  },
  methods: {
    ...mapActions(["addToWishlist", "modifyBasket"]),
    ajaxFindProduct(query) {
      //console.log(query);
      if (query && query.length >= 3) {
        let url = "/api/producto/busqueda?search=" + query;
        axios
          .get(url)
          .then((res) => {
            this.productos = res.data.data;
            //this.form.search = query;
          })
          .catch((err) => this.showError(err));
      }
    },
    ajaxFindUser(query) {
      let url = "/api/admin/clientes/persona?nombre=" + query;
      axios
        .get(url)
        .then((res) => {
          this.usuarios = res.data.data;
        })
        .catch((err) => this.showError(err));
    },
    getTipoUsuario() {
      let url = "/api/tipousuario/";
      axios
        .get(url)
        .then((res) => {
          this.tipo_usuario = res.data.data;
        })
        .catch((err) => this.showError(err));
    },
    close() {
      this.activeOferta = null;
    },
    save() {
      /*this.form.cDia = this.form.relaciones.dias["nombre"];
      this.form.cSemana = this.form.relaciones.semanas["nombre"];
      this.form.cMes = this.form.relaciones.meses["nombre"];*/

      //console.log("DATOS FORMULARIO: ", this.form);

      let url = "/api/admin/admofertas/store";

      if (this.item.id > 0) url = "/api/admin/admofertas/update";

      axios
        .post(url, this.form)
        .then((res) => {
          this.$noty.success(res.data.data);
          this.$emit("on-table-props-changed");
          this.$emit("closeDialog");
        })
        .catch(this.showError);
    },
    saveNewOffer() {
      // Morfado por Merge
      axios.post("/api/admin/admofertas/newID").then((response) => {
        // Modif


        if (parseInt(response.data) < 10) {
          this.form.codigo = "000" + response.data;
        } else if (parseInt(response.data) < 100) {
          this.form.codigo = "00" + response.data;
        } else if (parseInt(response.data) < 1000) {
          this.form.codigo = "0" + response.data;
        } else if (parseInt(response.data) >= 1000) {
          this.form.codigo = response.data;
        }

        let url = "/api/admin/admofertas/store";
        axios
          .post(url, this.form)
          .then((res) => {
            this.$noty.success(res.data.data);
            this.$emit("on-table-props-changed");
            this.$emit("closeDialog");
          })
          .catch(this.showError);
          // Cierre del axios
      });
    },
    getOferta(item) {
      let url = "/api/admin/admofertas/" + item.id;
      axios
        .get(url)
        .then((res) => {
          this.form = res.data.data;


          if(this.form.relaciones.dias != null) {
            this.form.cDia = this.form.relaciones.dias[0];

            this.dsemana.map((dia) => {
              if(dia.nombre == this.form.cDia) {
                this.form.dsemana = dia;
              }
            });
          }

          if(this.form.relaciones.semanas != null) {
            this.form.cSemana = this.form.relaciones.semanas[0];

            this.semana.map((semana) => {
              if(semana.nombre == this.form.cSemana) {
                this.form.semana = semana;
              }
            });

          }

          if(!Array.isArray(this.form.relaciones.meses)){
            this.form.cMes = (this.form.relaciones.meses != null) ? this.form.relaciones.meses : 'Sin Especificar';

            this.mes.map((m) => {
              if(m.nombre == this.form.cMes) {
                this.form.mes = m;
              }
            });

          }

          //console.log(this.form);
        })
        .catch((err) => this.showError(err));
    },
    generateCode() {
      // || Acá ya se esta generando codigo nuevo.
      axios.post('/api/admin/admofertas/newID').then((response) => {
        if (parseInt(response.data) < 10) {
          this.form.codigo = "000" + response.data;
        } else if (parseInt(response.data) < 100) {
          this.form.codigo = "00" + response.data;
        } else if (parseInt(response.data) < 1000) {
          this.form.codigo = "0" + response.data;
        } else if (parseInt(response.data) >= 1000) {
          this.form.codigo = response.data;
        }
      });
    },
  },
};
</script>

<style scoped lang="scss">
.wishBtn {
  background-color: #4595c2;
  border-color: #4595c2;

  &:hover {
    background-color: #242424;
    border-color: #242424;
  }
}

.whatsapp_product {
  i,
  a {
    color: #07ac40;
  }
}
</style>
