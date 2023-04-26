<template>
    <vue-modal ref="modal" size="md" @close="volver" >
        <template slot="title">Mi Perfil</template>
        <template slot="body">
          <form @submit.prevent="modifyUser" action >
            <div class="container">
                <!-- nombre -->
                <div class="form-group">
                    <label class="text">Nombre</label>
                    <input
                      v-model="editUser.nombre"
                      type="text"
                      class="form-control span12"
                      id="nombre"
                      name="nombre"
                      autocomplete="off"
                      :placeholder=getUser.persona.nombre
                    />
                </div>
                <!-- apellido -->
                <div class="form-group">
                    <label class="text">Apellido</label>
                    <input
                      v-model="editUser.apellido"
                      type="text"
                      class="form-control span12"
                      id="apellido"
                      name="apellido"
                      :placeholder=getUser.persona.apellido
                    />
                </div>
                <!-- cuit -->
                <div class="form-group">
                    <label class="text">Cuit</label>
                    <input
                      v-model="editUser.cuit"
                      type="text"
                      class="form-control span12"
                      id="cuit"
                      name="cuit"
                      :placeholder=getUser.persona.cuit
                    />
                </div>
                <!-- email -->
                <div class="form-group">
                    <label class="text">Email</label>
                    <input
                      v-model="editUser.email"
                      type="text"
                      class="form-control span12"
                      id="email"
                      name="email"
                      :placeholder=getUser.email
                      />
                </div>
                <!-- contraseña -->
                <div class="form-group">
                    <label class="text">Contraseña</label>
                    <input
                      v-model="editUser.password"
                      type="password"
                      class="form-control span12"
                      id="password"
                      name="password"
                      placeholder="********"
                    />
                </div>
                <!-- telefono -->
                <div class="form-group">
                    <label class="text">Teléfono</label>
                    <input
                      v-model="editUser.telefono"
                      type="text"
                      class="form-control span12"
                      id="telefono"
                      name="telefono"
                      :placeholder=getUser.persona.telefono
                    />
                </div>
                <!-- empresa -->
                <div class="form-group">
                    <label class="text">Empresa</label>
                    <input
                      v-model="editUser.empresa"
                      type="text"
                      class="form-control span12"
                      id="empresa"
                      name="empresa"
                      :placeholder=getUser.persona.empresa
                    />
                </div>
                <!-- país -->
                <div class="form-group">
                    <label class="text">País</label>
                    <v-select
                      class="mb-3"
                      v-model="editUser.pais"
                      label="nombre"
                      placeholder="Ingrese su País"
                    />
                </div>
                <!-- provincia -->
                <div class="form-group">
                    <label class="text">Provincia</label>
                    <v-select
                      class="no-arrows"
                      v-model="editUser.provincia"
                      label="nombre"
                      placeholder="Ingrese su Provincia"
                    />
                </div>
                <!-- localidad -->
                <div class="form-group">
                    <label class="text">Localidad</label>
                    <v-select
                      class="no-arrows"
                      v-model="editUser.localidad"
                      label="nombre"
                      placeholder="Ingrese su Localidad"
                    />
                </div>
                <!-- dirección -->
                <div class="form-group">
                    <label class="text">Dirección</label>
                    <input
                    v-model="editUser.direccion"
                      type="text"
                      class="form-control span12"
                      id="direccion"
                      name="direccion"
                      :placeholder=getUser.persona.domicilios[0].direccion
                    />
                </div>
            </div>
            <div>
              <button class="btn btn-success btn-block" @click="guardar" type="submit">Guardar</button>
            </div>
          </form>
        </template>
    </vue-modal>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default{
      data(){
        return{
          editUser:{}
        }
      },
      computed: {
        ...mapGetters(["getUser"])
      },
      methods: {
        ...mapActions(["logout"]),
        modifyUser(){
          axios.post('/api/miperfil', this.editUser)
          .then()
          .catch();
          if(this.editUser.nombre != null){
            this.getUser.persona.nombre = this.editUser.nombre;
          }
          if(this.editUser.apellido != null){
            this.getUser.persona.apellido = this.editUser.apellido;
          }
          if(this.editUser.cuit != null){
            this.getUser.persona.cuit = this.editUser.cuit;
          }
          if(this.editUser.email != null){
            this.getUser.email = this.editUser.email;
          }
          if(this.editUser.telefono != null){
            this.getUser.persona.telefono = this.editUser.telefono;
          }
          if(this.editUser.empresa != null){
            this.getUser.persona.empresa = this.editUser.empresa;
          }
          //pais?
          //provincia?
          //localidad?
          if(this.editUser.direccion != null){
            this.getUser.persona.domicilios[0].direccion = this.editUser.direccion;
          }
        },
        guardar(){
          this.$noty.success('Su Perfil fue editado correctamente');
          this.$noty.success('Los cambios se aplicaran en su proximo ingreso.');
          setTimeout(() => {
            this.logout().then(() => {
                this.$router.push({ name: "home" }, undefined, () => {
                    this.$router.go();
                });
            });
          },3000);     
          
        },
        volver(){
          this.$router.push({ name: "home" });
        }
      },
}

</script>