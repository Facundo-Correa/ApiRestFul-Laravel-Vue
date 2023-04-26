<template>
    <vue-modal @close="close">
        <template slot="title">Viste previa del presupuesto</template>
        <template slot="body">
            <div class="container">
                <header class="row header">
                    <div class="usuario">
                        <!-- datos del usuario -->
                        <li class="row iz">
                            <h4>Nombre de la empresa:</h4>
                            <span class="iz">{{getUser.persona.empresa}}</span>
                        </li>
                        <li class="row iz">
                            <h4>CUIT:</h4>
                            <span class="iz">{{getUser.persona.cuit}}</span>
                        </li>
                        <li class="row">
                            <h4>Teléfono:</h4>
                            <span class="iz">{{getUser.persona.telefono}}</span>
                        </li>
                        <li class="row">
                            <h4>Nombre:</h4>
                            <span class="iz">{{getUser.persona.nombre}}</span>
                            <span class="iz">{{getUser.persona.apellido}}</span>
                        </li>
                    </div>
                    <div class="destinatario">
                        <!-- datos del destinatario -->
                        <li class="row">
                            <h4>Destinatario:</h4>
                            <span class="iz">{{destinatario.nombre}}</span>
                        </li>
                        <li class="row">
                            <h4>Teléfono:</h4>
                            <span class="iz">{{destinatario.telefono}}</span>
                        </li>
                        <li class="row">
                            <h4>Email:</h4>
                            <span class="iz">{{destinatario.email}}</span>
                        </li>
                        <li class="row">
                            <h4>Fecha:</h4>
                            <span class="iz">{{fecha}}</span>
                        </li>
                    </div>
                </header>
                <body class="mt-5">
                    <div class="row col conte">
                        <div class="cart_item med" v-for="item of wishlist.data" :key="item.id" :item="item">
                            <div class="cart_img foto" v-if="item.image_thumb" style="width: 20%;">
                                <img :src="item.image_thumb" />
                            </div>
                            <div class="column descripcion">
                                <h4 class="row">ID #<p>{{item.id}}</p></h4>
                                <b class="pa">{{item.nombre}}</b>
                                <div class="row">
                                    <p>Cantidad por envase:</p>
                                    <p v-if="item.umq > 1" class="pa">{{item.umq}} unidades</p>
                                    <p v-if="item.um === 'PAR'&&item.umq > 1" class="pa">{{item.umq}} pares</p>
                                    <p v-else-if="item.um=='PAR'" class="pa">{{item.umq}} par</p>
                                    <p v-if="(item.um === 'JGO' || item.um === 'BJ')&&(item.umq > 1)" class="pa">{{item.umq}} uegos</p>
                                    <p v-else-if="item.um === 'JGO' || item.um === 'BJ'" class="pa">{{item.umq}} juego</p>
                                </div>
                            </div>
                            <div>
                                <a @click="remove(item.id, item.is_combo)">
                                    <i class="ion-android-close"></i>
                                </a>
                            </div>
                            <div class="precio row">
                                <div class="column">
                                    <b>Precio:</b>
                                    <p>${{(item.precio+(item.precio*destinatario.margen/100)).toFixed(2)}}</p>
                                </div>
                            </div>
                            <div class="mCant column">
                                <div class="ttu">
                                    <b>Cantidad:</b>
                                </div>
                                <div class="botCant row">
                                    <button class="btn btn-danger btn-sm" 
                                    @click="item.cantidad--"
                                    v-if="item.cantidad > 0">-</button>
                                    <div class="cantidad">
                                        {{item.cantidad}}
                                    </div>
                                    <button class="btn btn-primary btn-sm" 
                                    @click="item.cantidad++"
                                    >+</button>
                                </div>
                            </div>
                            <div class="mTot column">
                                <b>Total:</b>
                                <p>${{((item.precio+item.precio*destinatario.margen/100)*item.cantidad).toFixed(2)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary fSubTot">
                                <div class="row justify-content-end">
                                <div class="col-md-3 tRight">
                                    <b>SUBTOTAL:</b>
                                </div>
                                <div class="col-md-2 tLeft">$ {{subtotal.toFixed(2)}}</div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-primary fIva">
                                <div class="row justify-content-end">
                                <div class="col-md-3 tRight">
                                    <b>IVA:</b>
                                </div>
                                <div class="col-md-2 tLeft">$ {{iva.toFixed(2)}}</div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-primary fTot">
                                <div class="row justify-content-end">
                                <div class="col-md-3 tRight">
                                    <b>TOTAL:</b>
                                </div>
                                <div class="col-md-2 tLeft">$ {{total.toFixed(2)}}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </body>
            </div>
            <div class="mt-2">
                <!-- boton para volver al principio sin borrar los presupuestos -->
                <button class="btn btn-danger" @click="reload()">Volver</button>
                <!-- boton para guardar el presupuesto en MisPresupuestos y limpia los presupuestos -->
                <button class="btn btn-secondary" @click="guardarPresupuesto()" type="submit">Guardar</button>
                <!-- boton para enviar el presupuesto, limpia los presupuestos -->
                <button class="btn btn-primary" @click="enviar()">Enviar</button>
            </div>
            <!-- modal de enviar por mail/whatsapp -->
            <enviarVistapreviaVue
            v-if="showEnviar"
            :destinatario = destinatario
            :showEnviar = showEnviar
            @close = "cerrarModalHijo"
            />
        </template>
    </vue-modal>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import wishlist from '../../store/wishlist';
import enviarVistapreviaVue from './enviarVistaprevia.vue';

export default{
    data(){
        return{
            showEnviar: false,
            showMail: false,
        }
    },
    //traigo el objeto destinatario del complemento Presupuesto como props, se declara en la etiqueta
    props:['destinatario'], 
    computed:{
        ...mapGetters(["getUser", "wishlist", "wishlistLoading"]),
        fecha(){
            let today = new Date();
            let now = today.toLocaleDateString('es-AR');
            return now;
        },
        subtotal(){
          if(this.wishlist.data){
            //creo 3 arrays vacios a llenar posteriormente
            let precios = [];
            let cantidad = [];
            let subtot=[]
            //recorro el total de items agregados al wishlist
            for(let i=0; i<this.wishlist.total; i++){
                //al array de precios le guardo los precios de cada item multiplicados por los umq de cada item
                precios[i] = (this.wishlist.data[i].precio)*(this.wishlist.data[i].umq);
                //al array de cantidad le guardo las cantidades de cada item
                cantidad[i] = this.wishlist.data[i].cantidad;
                //guardo en cada slot del array subtot cada precio multiplicado por su cantidad
                subtot[i]= (cantidad[i])*(precios[i]+(precios[i]*this.destinatario.margen/100));
            }
            //al total le sumarizo todo el array de subtot
            let total = (subtot.reduce((a, b) => a + b, 0));
          return total;//retorno el valor que contiene total
          }
        },
        iva() {
          return this.subtotal * 0.21;
        },
        total() {
          return this.subtotal + this.iva;
        },
        margen(){
            let margen = ((this.total) * (this.destinatario.margen/100)) + this.total;
            return margen;
        }
    },
    methods: {
        ...mapActions(["getWishlist", "removeFromWishlist", "modifyBasket", "modifyWishlist", "clearBasket"]),
        reload() {
            location.reload();
        },
        remove(id, is_combo) {
            this.removeFromWishlist({ id: id, is_combo: is_combo });
        },
        cerrarModalHijo(){
            for(let y=0; y<this.wishlist.total; y++){
                this.removeFromWishlist({id: this.wishlist.data[y].id, is_combo: false});
            }
            this.showEnviar = false;
            let pantalla = window.screen.width;
            if(pantalla < 768){
                this.$router.push({name:'home'});
            }
            else{
                this.$router.push({name:'MiCuentaPresupuestos'});
            }
        },
        guardarPresupuesto(){

            for(let i=0; i<this.wishlist.total; i++){
                
                let presupuesto={};

                presupuesto.productoId = this.wishlist.data[i].id;
                presupuesto.precio = (this.wishlist.data[i].precio)+((this.wishlist.data[i].precio)*(this.destinatario.margen/100));
                presupuesto.umq = this.wishlist.data[i].umq;
                presupuesto.cantidad = this.wishlist.data[i].cantidad;
                let total = (this.wishlist.data[i].precio)*(this.wishlist.data[i].umq)*(this.wishlist.data[i].cantidad);
                presupuesto.total = total+(total*this.destinatario.margen/100);
                
                axios.post("/api/guardarpresupuesto", presupuesto)
                .then()
                .catch();
            }

            for(let y=0; y<this.wishlist.total; y++){
                this.removeFromWishlist({id: this.wishlist.data[y].id, is_combo: false});
            }

            this.$noty.success('Presupuesto guardado en Mis Presupuestos');
            setTimeout(() => {this.close()},3000);
        },
        enviar(){

            for(let i=0; i<this.wishlist.total; i++){
                
                let presupuesto={};

                presupuesto.productoId = this.wishlist.data[i].id;
                presupuesto.precio = (this.wishlist.data[i].precio)+((this.wishlist.data[i].precio)*(this.destinatario.margen/100));
                presupuesto.umq = this.wishlist.data[i].umq;
                presupuesto.cantidad = this.wishlist.data[i].cantidad;
                let total = (this.wishlist.data[i].precio)*(this.wishlist.data[i].umq)*(this.wishlist.data[i].cantidad);
                presupuesto.total = total+(total*this.destinatario.margen/100);
                
                axios.post("/api/guardarpresupuesto", presupuesto)
                .then()
                .catch();
            }
            //this.clearBasket();//borra el basket al darle enviar
            this.showEnviar = true;
        },
        close(){
            this.$router.push({name:'productos',params:{search:'nuevos'}});
        }
    },
    components:{enviarVistapreviaVue}
}

</script>

<style>
.header{
    justify-content: space-around;
}
.cantidad{
    margin-left: 3vh;
    margin-right: 3vh;
}
.iz{
    margin-left: 3px;
}
.med{
    height: 15vh;
    width: 100%;
}
.pa{
    padding-left: 5px;
}
.img{
    width: 20%;
}
.descripcion{
    width: 40%;
}
.precio{
    width: 10%;
}
.mCant{
    width: 20%;
}
.mTot{
    width: 10%;
}
.ttu{
    margin-left: 15%;
}
.tRight{
    text-align: right;
}
.tLeft{
    text-align: left;
}
@media screen and (max-width: 768px){
    .usuario, .destinatario{
        width: 316px;
        padding: 0px;
        margin: 0px;
    }
    .conte{
        width: 311px;
    }
    .foto{
        width: 100px;
    }
    .descripcion{
        width: 190px;
    }
    .precio, .mCant, .mTot{
        width: 80px;
        margin-bottom: 20px;
    }
    .cantidad{
        margin-left: 3px;
        margin-right: 3px;
    }
    .med{
        display: flex;
        flex-flow: row wrap;
        height: auto;
        padding: 0px;
        margin: 0px;
    }
    .tRight{
        text-align: left;
        width: 50%;
    }
    .tLeft{
        text-align: right;
        width: 50%;
    }
}
</style>