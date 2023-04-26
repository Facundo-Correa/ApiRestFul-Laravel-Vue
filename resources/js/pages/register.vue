<template>
  <div class="customer_login mt-60">
    <div class="container">
      <div class="row justify-content-center">
        <!--login area start-->
        <div class="col-md-10">
          <div class="modlog">
            <h2>Registro</h2>
            <form @submit.prevent="regUser" action method="post" id="formRegistro">
              <div class="row" style="margin: 10px">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="text">Email</label>
                    <input
                      v-model="user.email"
                      type="text"
                      class="form-control span12"
                      id="email"
                      name="email"
                      placeholder="Ingrese el email"
                    />
                  </div>

                  <div class="form-group">
                    <label class="text">Clave</label>
                    <input
                      v-model="user.password"
                      type="password"
                      class="form-control span12"
                      id="pass"
                      name="pass"
                      placeholder="Ingrese su clave"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Nombre</label>
                    <input
                      v-model="user.nombre"
                      type="text"
                      class="form-control span12"
                      id="nombre"
                      name="nombre"
                      autocomplete="off"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Apellido</label>
                    <input
                      v-model="user.apellido"
                      type="text"
                      class="form-control span12"
                      id="apellido"
                      name="apellido"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Nacimiento</label>
                    <input
                      v-model="user.nacimiento"
                      class="form-control span12"
                      type="date"
                      id="nacimiento"
                      name="nacimiento"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Empresa</label>
                    <input
                      v-model="user.empresa"
                      type="text"
                      class="form-control span12"
                      id="empresa"
                      name="empresa"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Telefono</label>
                    <input
                      v-model="user.telefono"
                      type="text"
                      class="form-control span12"
                      id="telefono"
                      name="telefono"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="text">País</label>
                    <v-select
                      class="mb-3"
                      v-model="user.pais"
                      :options="paises"
                      label="nombre"
                      placeholder="Ingrese su País"
                      @input="getProv"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Provincia</label>
                    <v-select
                      class="no-arrows"
                      v-model="user.provincia"
                      label="nombre"
                      placeholder="Ingrese su Provincia"
                      :options="provincias"
                      @input="getLoc"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Localidad</label>
                    <v-select
                      class="no-arrows"
                      v-model="user.localidad"
                      label="nombre"
                      placeholder="Ingrese su Localidad"
                      :options="localidades"
                    />
                  </div>
                  <div class="form-group">
                    <label class="text">Direccion</label>
                    <input
                      v-model="user.direccion"
                      type="text"
                      class="form-control span12"
                      id="direccion"
                      name="direccion"
                    />
                  </div>

                  <div class="form-group">
                    <label class="text">CUIT</label>
                    <input
                      v-model="user.cuit"
                      type="text"
                      class="form-control span12"
                      id="cuit"
                      name="cuit"
                      placeholder="00-00000000-0"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        name="ofertas"
                        id="ofertas"
                        class="custom-control-input"
                        checked
                        v-model="user.ofertas"
                      />
                      <label for="ofertas" class="custom-control-label">
                        Deseo Recibir ofertas unicas
                        para el
                        canal
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        name="news"
                        id="news"
                        class="custom-control-input"
                        checked
                        v-model="user.newsletter"
                      />
                      <label for="news" class="custom-control-label">
                        Deseo Recibir newsletter con
                        novedades
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        name="terminos"
                        id="terminos"
                        class="custom-control-input"
                        checked
                        v-model="user.terminos"
                      />
                      <label for="news" class="custom-control-label">
                        Acepto los
                        <a
                          href="#"
                          data-toggle="modal"
                          data-target="#modal_box"
                          title="quick view"
                        >
                          <span class="ion-ios-search-strong"></span><b>TERMINOS Y CONDICIONES</b>
                        </a> para poder operar en el sitio.
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal_body">
            <div class="container">
              <div class="row">
                <h2>Terminos y Condiciones</h2>
                <p>
                  Estimado cliente, ML Repuestos pone a su disposición una nueva herramienta de
                  consultas que consideramos va a ser de gran utilidad ya que utilizándola Ud.
                  podrá:
                </p>
                <ul>
                  <li>Ver stocks y precios de nuestros artículos on line.</li>
                  <li>
                    Realizar consultas técnicas referentes a la aplicación de determinadas partes
                    para las diferentes marcas y modelos.
                  </li>
                  <li>Observar las fotos detalladas de los artículos.</li>
                  <li>Realizar sus pedidos y visualizar los anteriormente ya realizados.</li>
                  <li>Consultar su estado de cuenta corriente.</li>
                  <li>Descargar sus facturas electrónicas.</li>
                  <li>
                    Consultar nuestra página le permite ver y elegir nuestros productos, como si
                    estuviese recorriendo nuestro salón de ventas.
                  </li>
                </ul>
                <p>Se le informa las condiciones de uso.</p>
                <ul>
                  <li>Las fotos son de carácter ilustrativo.</li>
                  <li>
                    Los stocks no representan compromiso de entrega y están sujetos a
                    disponibilidad.
                  </li>
                  <li>Los artículos importados pueden diferir de marca u origen.</li>
                  <li>
                    Los precios están expresados en pesos, no incluyen IVA y podrian sufrir
                    modificaciones al momento de facturación sin previo aviso.
                  </li>
                  <li>Compra minima inicial $50.000.</li>
                </ul>
              </div>
            </div>
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
  data() {
    return {
      user: {
        username: null,
        password: null,
        email: null,
        nombre: null,
        apellido: null,
        localidad: null,
        pais: null,
        provincia: null,
        nacimiento: null,
        empresa: null,
        celular: null,
        telefono: null,
        direccion: null,
        cuit: null,
        perfiles: null,
        terminos: true,
        ofertas: true,
        newsletter: true
      },
      submitted: false,
      errorMsg: false
    };
  },
  mounted() {
    if (!this.paises.length) {
      this.getPais(0);
    }
  },
  computed: {
    ...mapGetters(["paises", "provincias", "localidades"])
  },
  methods: {
    ...mapActions(["getPais", "getProvincias", "getLocalidades"]),
    getProv(parent) {
      this.getProvincias(parent.id);
    },
    getLoc(parent) {
      this.user.localidad = null;
      this.getLocalidades(parent.id);
    },

    regUser() {
      axios
        .post("/api/register", this.user)
        .then(res => {
          this.$noty.success(res.data.data);
          this.$router.push({ name: "login" });
        })
        .catch(err => {
          return this.showError(err);
        });
    }
  }
};
</script>

<style scoped>
text {
  color: #0b0b0b !important;
}

.modlog {
  background-color: whitesmoke;
  padding: 15px;
  border-radius: 10px;
  margin-bottom: 70px;
}

.regss {
  text-align: left;
}
</style>
