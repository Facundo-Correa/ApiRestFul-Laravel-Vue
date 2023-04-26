<template>
    <vue-modal @close="$emit('close')">
        <template slot="title">Detalle del Presupuestos</template>
        <template slot="body">
            <div class="row header top">
                <div class="divv">Imagen</div>
                <div class="nombre">Producto</div>
                <div class="sas">ID</div>
                <div class="sas">Cantidad</div>
                <div class="divv">Precio Producto<br>(+{{producto.margen_destinatario}}% de margen)</div>
                <div class="divv">Total</div>
                <div class="divv">Unidad por paquete</div>
            </div>
            <div v-for="item in item" class="row header for">
                <div class="img">
                    <img :src="item.producto[0].image_thumb" alt="" class="imag">
                </div>
                <div class="nombre">{{item.producto[0].nombre}}</div>
                <div class="sas"><p>{{item.producto_id}}</p></div>
                <div class="sas">{{item.cantidad_producto}}</div>
                <div class="divv">{{item.precio_producto}}</div>
                <div class="divv">{{item.total_producto}}</div>
                <div class="divv">{{item.umq_producto}}</div>
            </div>
        </template>
    </vue-modal>
</template>

<script>

export default{
    data(){
        return{
            margen: this.producto.margen_destinatario,
            item: this.producto.presupuesto_producto,
            fecha: this.producto.fecha,
        }
    },
    mounted(){
        // console.log(this.producto);
    },
    props: ["producto"],

}
</script>
<style scoped>
.divv{
    width: 14%;
    margin-top: 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.sas{
    width: 7%;
    margin-top: 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.nombre{
    width: 21%;
    margin-top: 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.img{
    width: 14%;
    height: 14%;
    margin-top: 0.5%;
    justify-content: center;
    align-items: center;
    justify-items: center;
    margin-bottom: 0.5%;
}
.imag{
    width: 50%;
    height: 50%;
    margin-left: 25%;
}
.top{
    background-color: rgb(120, 120, 120);
    display: flex;
    flex-direction: row;
    font-weight: bold;
    padding: 5px;
}
.for{
    display: flex;
    flex-direction: row;
    margin-top: 0.1%;
    background-color: rgb(169, 169, 170);
}
</style>