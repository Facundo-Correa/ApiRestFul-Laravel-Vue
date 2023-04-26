<template>
    <vue-modal ref="modal" size="sm" @close="volver" >
        <template slot="title">Hacer presupuesto</template>
        <template slot="body">
            <div class="container">
                <form @submit.prevent="agregarPresupuesto" action method="post">
                    <div class="column">
                        <div class="form-group">
                        <label class="form-label">Nombre del destinatario</label>
                        <input type="text" class="form-control" 
                        v-model="destinatario.nombre" 
                        id="nombre" name="nombre" 
                        placeholder="Nombre"
                        required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email del destinatario</label>
                        <input type="text" class="form-control" 
                        v-model="destinatario.email" 
                        id="email" name="email" 
                        placeholder="Email"
                        required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Teléfono del destinatario (sin 0 y sin 15)</label>
                        <input type="number" class="form-control" 
                        v-model="destinatario.telefono" 
                        id="telefono" name="telefono"
                        placeholder="Teléfono"
                        required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Margen de venta (en porcentaje %)</label>
                        <input type="number" class="form-control" 
                        v-model="destinatario.margen" 
                        id="margen" name="margen"
                        placeholder="Margen"
                        required/>
                    </div>
                    </div>
                    <div class="row">
                        <div class="botones">
                            <button class="btn btn-primary btn-block" @click="showVistaPrevia = true"
                            type="submit">Siguiente</button>
                        </div>
                    </div>
                </form>                
            </div>
            <VistaPreviaPresupuesto v-if="showVistaPrevia" 
            :destinatario="destinatario"
            @close = "cerrarVistaPrevia"/>
        </template>
    </vue-modal>
</template>

<script>
import VistaPreviaPresupuesto from './vistaPreviaPresupuesto.vue';
import mobileChecker from "../../mixins/mobileChecker";

export default{
    mixins:[mobileChecker],
    data() {
        return {
            showVistaPrevia: false,
            destinatario:{}
        };
    },
    components: { VistaPreviaPresupuesto },
    methods: {
        reload() {
            location.reload();
        },
        agregarPresupuesto() {
            axios.post("/api/presupuesto", this.destinatario)
            .then()
            .catch();
        },
        cerrarVistaPrevia(){
            this.showVistaPrevia = false;
        },
        volver(){
            let pantalla = window.screen.width;
            if(pantalla < 768){
                this.$router.push({name:'home'});
            }
            else{
                this.$router.push({name:'productos',params:{search:'nuevos'}});
            }
        },
    }
}

</script>

<style scoped>
.botones{
    display: flex;
    width: 100%;
    justify-content: space-between;
}
</style>