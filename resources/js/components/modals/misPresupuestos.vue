<template>
    <vue-modal @close="volver">
        <template slot="title"><h3>Mis Presupuestos</h3></template>
        <template slot="body">
            <div class="container">
                <div class="top">
                    <div class="indiv">
                        <p>Destinatario</p>
                    </div>
                    <div class="indiv">
                        <p>Email</p>
                    </div>
                    <div class="indiv">
                        <p>Telefono</p>
                    </div>
                    <div class="indiv">
                        <p>Fecha - Hora</p>
                    </div>
                    <div class="indiv">
                        <p>Enviado:</p>
                    </div>
                    <div class="botones">
                        <p>Opciones:</p>
                    </div>
                </div>
                <div>
                    <div v-for="presupuesto in presupuesto" class="for">
                        <div class="indiv bot">{{presupuesto.nombre_destinatario}}</div>
                        <div class="indiv bot">{{presupuesto.email_destinatario}}</div>
                        <div class="indiv bot">{{presupuesto.telefono_destinatario}}</div>
                        <div class="indiv bot" v-if="presupuesto.fecha">{{presupuesto.fecha}}</div>
                        <div class="indiv bot" v-else>{{presupuesto.created_at}}</div>
                        <div class="indiv bot">
                            <div v-if="presupuesto.estado == '3'">
                                <button class="btn btn-success btn-sm">Whatsapp</button>
                                <button class="btn btn-primary btn-sm">Mail</button>
                            </div>
                            <div v-else-if="presupuesto.estado == '2'">
                                <button class="btn btn-success btn-sm">Whatsapp</button>
                            </div>
                            <div v-else-if="presupuesto.estado == '1'">
                                <button class="btn btn-primary btn-sm">Mail</button>
                            </div>
                            <div v-else-if="presupuesto.estado == '0'" class="env">
                                <p>No enviado</p>
                            </div>
                        </div>
                        <div class="botones bot">
                            <button class="btn btn-warning ml-1" @click="verDetalles(presupuesto)">Ver</button>
                            <button class="btn btn-success ml-1" @click="alBasket(presupuesto.presupuesto_producto)">Generar compra</button>
                            <button class="btn btn-primary ml-1" @click="enviarMail(presupuesto)">Reenviar</button>
                            <button class="btn btn-danger ml-1" @click="borrar(presupuesto)">Borrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <detallePresupuestoVue
            v-if="showDetallePresupuesto" 
            :producto = producto
            :showDetallePresupuesto = showDetallePresupuesto
            @close = "cerrarModalHijo"
            />
            <enviarPresupuestoVue 
            v-if="showMail"
            :producto = producto
            :showMail = showMail
            @close = "cerrarModalHijo"
            />
        </template>
    </vue-modal>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import detallePresupuestoVue from "./detallePresupuesto.vue";
import enviarPresupuestoVue from "./enviarPresupuesto.vue";

    export default{
        data(){
            return{
                showDetallePresupuesto: false,
                showMail: false,
                presupuesto:[],
                producto:[],
            }
        },
        mounted() {
            axios.get('api/mispresupuestos')
                .then((respuesta) => {
                    this.presupuesto = respuesta.data.data;
                    // console.log(respuesta.data.data[0].nombre_destinatario+' respuesta');
                })
                .catch();
        },
        computed: {
            ...mapGetters(["getUser"]),
        },
        methods: {
            ...mapActions(["modifyBasket"]),
            volver(){
                this.$router.push({name:'productos',params:{search:'nuevos'}});
            },
            verDetalles(e){
                this.producto = e;
                this.showDetallePresupuesto = true;
            },
            enviarMail(p){
                this.producto = p;
                this.showMail = true;
            },
            borrar(e){
                axios.post('api/borrarpresupuesto/'+e.id)
                .then()
                .catch();
                this.$noty.warning("El presupuesto de "+e.nombre_destinatario+", creado el "+e.created_at+", fue borrado satisfactoriamente", {
                        layout: "top",
                        timeout: 5000,});
                setTimeout(() => {
                    location.reload();
                },5000);
            },
            alBasket(e){
                for(let i=0;i<e.length; i++){
                    this.modifyBasket([{ 
                        id: e[i].producto[0].id, 
                        quantity: e[i].cantidad_producto, 
                        is_combo: false, usa_puntos: false 
                    }])
                    .then(
                        this.$router.push({name:'basket'}), location.reload()
                    );
                }
            },
            cerrarModalHijo(){
                this.showDetallePresupuesto = false;
                this.showMail = false;
            }
        },
        components: {detallePresupuestoVue, enviarPresupuestoVue}

    }
</script>

<style scoped>
.top{
    background-color: rgb(120, 120, 120);
    display: flex;
    flex-direction: row;
    width: 100%;
    font-weight: bold;
    font-size: 14px;
    padding: 5px;
}
.indiv{
    display: flex;
    width: 13.5%;
    text-align: center;
    justify-content: center;
    align-items: center;
}
.indiv p{
    color: white;
}
.botones{
    display: flex;
    flex-direction: row;
    width: 15%;
    color: white;
}
.for{
    display: flex;
    flex-direction: row;
    margin-top: 0.1%;
    background-color: rgb(169, 169, 170);
}
.btn-sm{
    cursor:alias;
}
.env p{
    color: black;
}
</style>