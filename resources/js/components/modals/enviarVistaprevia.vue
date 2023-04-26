<template>
    <vue-modal @close="$emit('close')" size="xs">
        <template slot="title">Enviar presupuesto</template>
        <template slot="body">
            <div class="container column cont">
                <div class="marg">
                    <div>
                        <p>Enviar por:</p>
                    </div>
                    <div>
                        <button class="btn btn-primary" @click="mail">MAIL</button>
                    </div>
                </div>
                <div class="marg">
                    <div>
                        <p>Proximamente por:</p>
                    </div>
                    <div>
                        <a :href="url" target="_blank">
                        <button disabled class="btn btn-success" @click="what">WHATSAPP</button>
                    </a>
                    </div>
                </div>
                <div class="mar">
                    <img src="assets/img/logo/ml-repuestos-logo.png">
                </div>
            </div>
        </template>
    </vue-modal>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import wishlist from '../../store/wishlist';

export default{
    data(){
        return{
            url: '',
            producto: '',
            presupuesto:'',
            totalPresupuestado: '',
            presu: wishlist
        }
    },
    computed:{
        ...mapGetters(["getUser"]),
        fecha(){
            let today = new Date();
            let now = today.toLocaleDateString('es-AR');
            return now;
        },
    },
    mounted(){
        axios.get('api/mispresupuestos')
        .then((respuesta) => {
            
            this.producto = respuesta.data.data[0];

            let texto = []; let montoFinal = [];
            for(let i=0; i<respuesta.data.data[0].presupuesto_producto.length; i++){
                let cantidades = []; let nombres = []; let precios = [];

                cantidades[i] = respuesta.data.data[0].presupuesto_producto[i].cantidad_producto;
                precios[i] = respuesta.data.data[0].presupuesto_producto[i].precio_producto;
                montoFinal[i] = respuesta.data.data[0].presupuesto_producto[i].total_producto;
                nombres[i] = respuesta.data.data[0].presupuesto_producto[i].producto[0].nombre;
                texto[i] = nombres[i]+' ($'+precios[i]+')'+' x'+cantidades[i]+'(cantidad) = $'+montoFinal[i]+'. ';
            }
            let tex1 = texto.toString(); let tex2 = tex1.split(','); let tex3 = tex2.join("");
            
            this.presupuesto = tex3;
            this.totalPresupuestado = montoFinal.reduce((a, b) => a + b, 0);
            
            this.url = 'https://web.whatsapp.com/send?phone=549'+respuesta.data.data[0].telefono_destinatario
            +'&text=Hola '+respuesta.data.data[0].nombre_destinatario+' soy '+this.getUser.persona.nombre+'%20'
            +this.getUser.persona.apellido+'%20'+'de la empresa '+this.getUser.persona.empresa
            +'. Le envío el presupuesto solicitado: '+this.presupuesto+'. Total presupuestado (sin IVA): $'
            +this.totalPresupuestado;
        })
        .catch();
    },
    methods: {
        ...mapActions(["getWishlist", "removeFromWishlist", "modifyWishlist"]),
        mail(){

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

            for(let y=0; y<this.presu.total; y++){
                this.removeFromWishlist({id: this.presu.data[y].id, is_combo: false});
            }
        },
        what(){
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
}

</script>

<style scoped>
.cont{
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    flex-direction: column;
    margin-top: 10%;
}
.marg{
    margin-top: 10%;
}
.mar{
    margin-top: 40%;
}
</style>