<template>
        <vue-modal @close="volver">
            <template slot="title"><h3>Mis Compras</h3></template>
            <template slot="body">
                <div>
                    <h4>Historial de compras realizadas:</h4>
                </div>
                <div class="container">
                    <div class="row top">
                        <div>
                            <p>Fecha y Hora</p>
                        </div>
                        <div>
                            <p>Número de pedido:</p>
                        </div>
                        <div>
                            <p>Estado:</p>
                        </div>
                        <div>
                            <p>Acciones:</p>
                        </div>
                    </div>
                    <div v-for="compras in compras" class="row bottom">
                        <div class="sas">
                            <p>{{compras.fecha_pedido}}</p>
                        </div>
                        <div class="sas">
                            <p>{{compras.id}}</p>
                        </div>
                        <div v-if="compras.pedido == ''" class="sas">
                            <i class="fas fa-check" title="Pedido no recibido"></i>
                        </div>
                        <div v-else-if="compras.pedido == 'OK'" class="sas">
                            <i class="fas fa-check-double" title="Pedido recibido"></i>
                        </div>
                        <div v-else class="sas">
                            <!-- Error en compra por cuenta corriente -->
                            <i class="fas fa-check" title="Pedido no recibido"></i>
                        </div>
                        <div class="botones">
                            <button class="btn btn-warning" @click="verCompras(compras)">Ver compra</button>
                            <button class="btn btn-success ml-1" @click="alBasket(compras.productos)">Volver a comprar</button>
                        </div>
                    </div>
                </div>
                <detalleComprasVue 
                v-if = showCompras
                :comp = comp
                :showCompras = showCompras
                @close = "go"
                />
            </template>
        </vue-modal>
</template>

<script>
import { mapActions } from "vuex";
import detalleComprasVue from "./detalleCompras.vue";

export default{
    data(){
        return {
            showCompras: false,
            compras:[],
            comp:'',
        }
    },
    mounted(){
        axios.get('api/miscompras')
        .then((respuesta) => {
                    this.compras = respuesta.data.data;
                })
        .catch();
    },
    methods: {
        ...mapActions(["removeFromWishlist", "modifyBasket"]),
        volver(){
                this.$router.push({name:'productos',params:{search:'nuevos'}});
        },
        verCompras(e){
            this.comp = e;
            this.showCompras = true;
        },
        alBasket(e){
            for(let i=0;i<e.length; i++){
                this.modifyBasket([{ 
                    id: e[i].id,
                    quantity: e[i].pivot.cantidad, 
                    is_combo: false, usa_puntos: false 
                }])
                .then(
                    this.$router.push({name:'basket'}), location.reload()
                    );
            }
        },
        go(){
            this.showCompras = false;
        }
    },
    components: {detalleComprasVue}
}

</script>

<style scoped>
.bottom{
    background-color: rgb(169, 169, 170);
    margin-top: 0.1%;
}
.top{
    background-color: rgb(120, 120, 120);
    color: white;
    font-weight: bold;
    font-size: 14px;
}
.top div{
    width: 20%;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.fas{
    color: rgb(134, 219, 255);
}
.sas{
    width: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.botones{
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
</style>