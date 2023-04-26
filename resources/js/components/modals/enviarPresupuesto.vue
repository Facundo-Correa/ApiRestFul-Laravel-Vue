<template>
    <vue-modal @close="$emit('close')">
        <template slot="title">Enviar presupuesto</template>
        <template slot="body">
            <div class="container">
                <header class="row header">
                    <div>
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
                    <div>
                        <li class="row">
                            <h4>Destinatario:</h4>
                            <span class="iz">{{this.producto.nombre_destinatario}}</span>
                        </li>
                        <li class="row">
                            <h4>Teléfono:</h4>
                            <span class="iz">{{this.producto.telefono_destinatario}}</span>
                        </li>
                        <li class="row">
                            <h4>Email:</h4>
                            <span class="iz">{{this.producto.email_destinatario}}</span>
                        </li>
                        <li class="row">
                            <h4>Fecha:</h4>
                            <span class="iz">{{fecha}}</span>
                        </li>
                    </div>
                </header>
                <h4>Productos:</h4>
                <div class="row header">
                    <div class="divv">Imagen</div>
                    <div class="divv">Producto<br>ID</div>
                    <div class="divv">Cantidad</div>
                    <div class="divv">Precio Producto</div>
                    <div class="divv">Total</div>
                    <div class="divv">Unidad por paquete</div>
                </div>
                <div class="productos">
                    <div v-for="item in item" class="row header">
                        <div class="img">
                            <img :src="item.producto[0].image_thumb" alt="" class="imag">
                        </div>
                        <div class="divv">{{item.producto[0].nombre}}
                            <p>ID: {{item.producto_id}}</p>
                        </div>
                        <div class="divv">{{item.cantidad_producto}}</div>
                        <div class="divv">{{item.precio_producto}}</div>
                        <div class="divv">{{item.total_producto}}</div>
                        <div class="divv">{{item.umq_producto}}</div>
                    </div>
                </div>
                <div class="boton">
                    <button class="btn btn-primary btn-block mt-1" @click="enviarMail">Enviar por mail</button>
                </div>
                <div>
                    <a :href="url" target="_blank">
                        <button class="btn btn-success btn-block mt-1" @click="enviarW">Enviar por whatsapp</button>
                    </a>
                </div>
            </div>
        </template>
    </vue-modal>
</template>

<script>
import { mapGetters } from "vuex";
    export default{
        data(){
            return{
                item: this.producto.presupuesto_producto,
                presupuesto: '',
                totalPresupuestado: '',
                url: '',
            }
        },
        props: ["producto"],
        mounted(){
            let texto = []; let montoFinal = [];
            for(let i=0; i<this.producto.presupuesto_producto.length; i++){

                let cantidades = []; let nombres = []; let precios = [];

                cantidades[i] = this.producto.presupuesto_producto[i].cantidad_producto;
                precios[i] = this.producto.presupuesto_producto[i].precio_producto;
                montoFinal[i] = this.producto.presupuesto_producto[i].total_producto;
                nombres[i] = this.producto.presupuesto_producto[i].producto[0].nombre;
                texto[i] = nombres[i]+' ($'+precios[i]+')'+' x'+cantidades[i]+'(cantidad) = $'+montoFinal[i]+'. ';
            }
            let tex1 = texto.toString(); let tex2 = tex1.split(','); let tex3 = tex2.join("");
            this.presupuesto = tex3;
            this.totalPresupuestado = montoFinal.reduce((a, b) => a + b, 0);
            
            this.url = 'https://web.whatsapp.com/send?phone=549'+this.producto.telefono_destinatario
            +'&text=Hola '+this.producto.nombre_destinatario+' soy '+this.getUser.persona.nombre+'%20'
            +this.getUser.persona.apellido+'%20'+'de la empresa '+this.getUser.persona.empresa
            +'. Le envío el presupuesto solicitado: '+this.presupuesto+'Total presupuestado (sin IVA): $'+this.totalPresupuestado;
        },
        methods: {
            enviarMail(){

                let minombre = this.getUser.persona.nombre;
                let miapellido = this.getUser.persona.apellido;
                let miempresa = this.getUser.persona.empresa;
                let total = this.totalPresupuestado;
                let id = this.producto.id;
                let estado = "1";
                let mail = {
                    minombre,
                    miapellido,
                    miempresa,
                    total,
                    id,
                    estado,
                };

                this.$noty.success('Email enviado');

                axios.post('api/enviarmail', mail)
                .then()
                .catch();

                axios.post('api/editPresupuestoM', mail)
                .then()
                .catch();
                //continuar con los estados de whatsapp y de mail
                // setTimeout(() => {this.close()},3000);
            },
            enviarW(){

                let minombre = this.getUser.persona.nombre;
                let miapellido = this.getUser.persona.apellido;
                let miempresa = this.getUser.persona.empresa;
                let total = this.totalPresupuestado;
                let id = this.producto.id;
                let estado = "2";
                let mail = {
                    minombre,
                    miapellido,
                    miempresa,
                    total,
                    id,
                    estado,
                };

                axios.post('api/editPresupuestoW', mail)
                .then()
                .catch();
            }
        },
        computed: {
            ...mapGetters(["getUser"]),
            fecha(){
                let today = new Date();
                let now = today.toLocaleDateString('es-AR');
                return now;
            },
        }
    }
</script>
<style>
.divv{
    width: 14%;
    margin-top: 1%;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.img{
    width: 14%;
    height: 14%;
    margin-top: 1%;
    justify-content: center;
    align-items: center;
}
.imag{
    width: 50%;
    height: 50%;
    margin-left: 25%;
}
</style>