<template>
    <vue-modal @close="$emit('close')">
        <template slot="title">Detalle Compras</template>
        <template slot="body">
            <div class="container">
                <div class="row top">
                    <p class="titulos">Imagen</p>
                    <p class="titulos">ID</p>
                    <p class="titulos nombre">Nombre</p>
                    <p class="titulos">Precio</p>
                    <p class="titulos">Cantidad</p>
                    <p class="titulos">Descuento</p>
                    <p class="titulos">Total <br/> (+IVA)</p>
                </div>
                <div class="row">
                    <div v-for="item in item" class="row bottom">
                        <div class="imagen">
                            <img :src="item.image_thumb" alt="" class="imag">
                        </div>
                        <div class="text">
                            <p>
                                {{item.id}}
                            </p>
                        </div>
                        <div class="text nombre">
                            <p>
                                {{item.nombre}}
                            </p>
                        </div>
                        <div class="text">
                            <p>
                                ${{item.pivot.precio}}
                            </p>
                        </div>
                        <div class="text">
                            <p>
                                {{item.pivot.cantidad}}
                            </p>
                        </div>
                        <div class="text">
                            <p>
                                {{item.pivot.descuento_porcentaje}}%
                            </p>
                        </div>
                        <div class="text">
                            <p>
                                ${{((item.pivot.precio)*(item.pivot.cantidad)*(1.21)-(item.pivot.descuento_porcentaje)).toFixed(2)}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </vue-modal>
</template>

<script>

export default{
    data(){
        return {
            item: this.comp.productos
        }
    },
    props: ['comp'],
    methods: {
        
    },
}

</script>

<style scoped>
.top{
    background-color: rgb(120, 120, 120);
    color: white;
    font-weight: bold;
    font-size: 14px;
    padding: 5px;
}
.titulos{
    width: 11%;
    margin: 0%;
    padding: 0%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.text{
    width: 11%;
    margin: 0%;
    padding: 0%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.bottom{
    width: 100%;
    margin: 0%;
    padding: 0%;
    margin-top: 0.1%;
    background-color: rgb(169, 169, 170);
}
.imagen{
    width: 11%;
}
.imag{
    width: 100%;
    height: 100%;
    margin: 0%;
    padding: 0%;
}
.nombre{
    width: 25%;
}
</style>