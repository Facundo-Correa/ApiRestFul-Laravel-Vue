<template>
  <div id="index" style="background-color: #ebebeb">
    <div class="container-fluid p-0">
        <!-- BUSCADOR -->
        <div class="header_bottom">
          <div class="container">
            <div class="row">
              <div style="margin-top: 5px" class="col-xs-12">
                <h2>Ingrese método de búsqueda</h2>
              </div>
              <div class="col-md-10">
                <div class="row">
                  <div class="searchImput col-md-6">
                    <input
                      type="text"
                      v-model="form.nombre"
                      v-on:keyup.enter="onBusqueda"
                      placeholder="Buscar por Nombre"
                      class="codsInput mb-3 mb-md-0"
                    />
                  </div>
                  <div class="searchImput col-md-6">
                    <input
                      type="text"
                      v-model="form.email"
                      v-on:keyup.enter="onBusqueda"
                      placeholder="Buscar por email"
                      class="codsInput mb-3 mb-md-0"
                    />
                  </div>
                  <div class="searchImput col-md-4">
                    <input
                      type="text"
                      v-model="form.id"
                      v-on:keyup.enter="onBusqueda"
                      placeholder="Buscar por ID"
                      class="codsInput mb-3 mb-md-0"
                    />
                  </div>
                  <div class="searchImput col-md-4">
                    <input
                      type="text"
                      v-model="form.n_plataforma"
                      v-on:keyup.enter="onBusqueda"
                      placeholder="Buscar por N° de Plataforma"
                      class="codsInput mb-3 mb-md-0"
                    />
                  </div>
                  <div class="searchImput col-md-4">
                    <select
                      v-model="form.status_id"
                      class="codsInput mb-3 mb-md-0">
                      <option disabled value="">Buscar por Status</option>
                      <option v-bind:value='1'>Habilitado</option>
                      <option v-bind:value='2'>Inhabilitado</option>
                      <option v-bind:value='4'>Moroso</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block h-30" @click="onBusqueda">Buscar</button>
                <button type="submit" class="btn btn-primary btn-block h-30" @click="onReset">Limpiar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- FINAL BUSCADOR -->
        <div class="container pb-4">
          <div class="col-xs-12">
            <h3>Resultados de Búsqueda</h3>
          </div>
          <div class="col-sm-12">
            <table class="table table-hover table-striped">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Usuario</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Empresa</th>
                          <th>Email</th>
                          <th>N° Plataforma</th>
                          <th>Status</th>
                          <th colspan="2">

                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="cliente of clientes">
                          <td width="10px">{{ cliente.id }}</td>
                          <td> {{ cliente.name }}</td>
                          <td> {{ cliente.persona.nombre }}</td>
                          <td> {{ cliente.persona.apellido }}</td>
                          <td> {{ cliente.persona.empresa }}</td>
                          <td> {{ cliente.email }}</td>
                          <td> {{ cliente.persona.n_plataforma }}</td>
                          <td v-if="cliente.persona.status_id == 1"> Habilitado</td>
                          <td v-if="cliente.persona.status_id == 2"> Inhabilitado</td>
                          <td v-if="cliente.persona.status_id == 4"> Moroso</td>
                          <!-- Button disabled si el cliente ya se encuentra Habilitado -->
                          <td width="10px" v-if="cliente.persona.status_id == 1">
                              <button type="button" @click="changeStatus(cliente.id)" class="btn btn-primary btn-sm">Deshabilitar</button>
                          </td>
                          <td width="10px" v-else>
                              <button type="button" @click="changeStatus(cliente.id)" class="btn btn-primary btn-sm">Habilitar</button>
                          </td>
                          <td width="10px">
                              <button type="button" class="btn btn-success btn-sm" @click="editClient(cliente)">Editar</button>
                          </td>
                          <td width="10px">
                              <button type="button" class="btn btn-danger btn-sm" @click="deleteUser(cliente.id)">Eliminar</button>
                          </td>
                      </tr>
                  </tbody>
            </table>
            <Modal v-model="showModal" title="Modificación de Cliente" v-if="showModal==true">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <h4>Usuario:</h4>
                    <input type="text" v-model="newCliente.name" disabled>
                  </div>
                  <div class="form-group">
                    <h4>Nombre:</h4>
                    <input type="text" v-model="newCliente.nombre" disabled>
                  </div>
                  <div class="form-group">
                    <h4>Apellido:</h4>
                    <input type="text" v-model="newCliente.apellido" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <h4>Empresa:</h4>
                    <input type="text" v-model="newCliente.empresa" disabled>
                  </div>
                  <div class="form-group">
                    <h4>Email:</h4>
                    <input type="text" v-model="newCliente.email" disabled>
                  </div>
                  <div class="form-group">
                    <h4>N° Plataforma:</h4>
                    <input type="number" v-model="newCliente.n_plataforma">
                  </div>
                  <!-- <div class="form-group">
                    <h4>NewsLetter:</h4>
                    <input type="radio" id="news1" value="news1" disabled>
                    <label for="news1">SI</label>
                    <input type="radio" id="news0" value="news0" disabled>
                    <label for="news0">NO</label>
                  </div>
                  <div class="form-group">
                    <h4>Ofertas:</h4>
                    <input type="radio" id="ofertas1" value="ofertas1" name="ofertas">
                    <label for="ofertas1">SI</label>
                    <input type="radio" id="ofertas0" value="ofertas0" name="ofertas">
                    <label for="ofertas0">NO</label>
                  </div> -->
                    <div class="form-group">
                      <button
                      type="button"
                      class="btn btn-danger"
                      @click="cancelEdit"
                      >Cancelar</button>
                      <button
                      type="button"
                      class="btn btn-primary"
                      @click="saveEdit"
                      >Grabar</button>
                    </div>
                </div>
              </div>
            </Modal>
          </div>
        </div>
    </div>
  </div>
</template>

<script>

import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      clientes: null,
      form: {
        nombre: null,
        email: null,
        id: null,
        n_plataforma: null,
        status_id: ''
      },
      cliente: null,
      oldCliente: null,
      newCliente: null,
      showModal: false,
    };
  },
  computed: {
    ...mapGetters(["auth", "isLoggedIn", "getUser"]),
    busquedaValida() {
      return (
        this.form.nombre ||
        this.form.email ||
        this.form.id ||
        this.form.n_plataforma ||
        this.form.status_id
      );
    }
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
  methods: {
    // getClientes(){
    //     axios.get('api/admin/clientes')
    //         .then(res=>{
    //             this.clientes = res.data.data;
    //             console.log(this.clientes);
    //
    //         })
    //         .catch(err=>console.log(err));
    //
    // },
    changeStatus(id){
      axios.post('api/admin/clientes/changeStatus/' + id)
          .then(res=>{
              this.$noty.success(res.data.data)
              this.onBusqueda()
              // this.getClientes()

          })
          .catch(err=>console.log(err));
    },
    editClient(cliente){
      this.newCliente = cliente;
      this.oldCliente = this.newCliente;
      this.showModal = true;
      //console.log('modalClient', this.oldCliente);
    },
    saveEdit(){
      // console.log('old', this.oldCliente);
      // console.log('new', this.newCliente);
      if (this.newCliente.n_plataforma != this.oldCliente.persona.n_plataforma){
        axios.post('api/admin/clientes/editClient/' + this.newCliente.id + '/' + this.newCliente.n_plataforma)
            .then(res=>{
                this.$noty.success(res.data.data)
                this.onBusqueda()

            })
            .catch(err=>console.log(err));
      }
      this.showModal = false;
    },
    deleteUser(id) {
      if (confirm("Esta seguro de borrar el cliente?")) {
        axios.delete('api/admin/clientes/delCliente/' + id)
            .then(res => {
              this.$noty.success(res.data.data)
              this.onBusqueda()
              // this.getClientes()

            })
            .catch(err => console.log(err));
      }
    },
    cancelEdit(){
      this.oldCliente = null;
      this.showModal = false;
    },
    onBusqueda() {
      if (!this.busquedaValida){
        this.$noty.error("Debe seleccionar algún criterio de busqueda.");
        } else {
          axios.put('/api/admin/clientes/busqueda', this.form)
							.then(res=>{
                //console.log('busqueda', res.data.data);
                  // this.clientes.data = res.data.data;
                  const array = res.data.data.map(x =>{
                      x.persona = {
                        nombre: x.nombre,
                        apellido: x.apellido,
  											empresa: x.empresa,
  											email: x.email,
  											n_plataforma: x.n_plataforma,
  											status_id: x.status_id,
                      };

											return x;
									});
                  //console.log('dataFinal', array);
                  this.clientes = array;
							})
							.catch(err=>console.log(err))
        }
      },
      onReset(){
        this.form = {
          nombre: null,
          email: null,
          id: null,
          n_plataforma: null,
          status_id: ''
        },
        // this.getClientes();
        this.clientes = null;
      }
    }
  };
</script>

<style scoped lang="scss">
li.datos {
  transition: all 0.3s ease 0s;
}

li.datos:hover {
  color: #4595c2;
}

.searchImput{
  padding: 5px;
}
</style>
