<template>
    <div id="quevendemos">
        <section class="que_vendemos py-5">
            <div class="container py-4">
                <div class="row m-0" v-if="this.proveedores">
                    <div class="col-12">
                        <h2 class="text-center mb-5">
                           ¿ QUE VENDEMOS ?
                        </h2>
                    </div>
                    <div class="col-12 proveedores-seccion">
                        <carousel
                                :nav="false"
                                :dots="true"
                                :loop="true"
                                :smartSpeed="1000"
                                :center="true"
                                :items="1"
                                v-if="proveedoresChunk.length"
                        >

                            <div class="row p-1" v-for="c in proveedoresChunk" :key="c.key">
                                <!-- bucleo combos -->
                                <div class="col-12 col-md-6 col-lg-4 p-3" v-for="proveedor in c.proveedores" :key="proveedor.id">
                                    <div class="card proveedor-card">
                                        <div class="card-header p-2">
<!--                                            <h4>-->
<!--                                                {{proveedor.proveedor}}-->
<!--                                            </h4>-->
                                            <div class="proveedor-logo" :style="{ 'background-image': 'url(\'assets/img/marcas/'+proveedor.id+'.jpg\')'}">

                                            </div>
                                        </div>
                                        <div class="separador"></div>
                                        <div class="card-body">
                                            <div class="row m-0">
                                                <div class="col-4 producto-imagen" v-for="producto in proveedor.productos">
                                                    <a v-if="isLoggedIn" @click="showModalFunc(producto)" :title="producto.nombre">
                                                        <div class="img-cont" v-if="tieneimg" :style="{ 'background-image': 'url(\''+producto.image_thumb+'\')'}">
                                                        </div>
                                                        <div class="img-cont" v-else style="background-image: url('https://via.placeholder.com/250')">
                                                        </div>
                                                    </a>
                                                    <router-link v-else to="/login">
                                                        <div class="img-cont" v-if="tieneimg" :style="{ 'background-image': 'url(\''+producto.image_thumb+'\')'}">
                                                        </div>
                                                        <div class="img-cont" v-else style="background-image: url('https://via.placeholder.com/250')">
                                                        </div>
                                                    </router-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </carousel>
                    </div>
                </div>
            </div>
            <productModal v-if="showModal" @close="showModal=false" :producto="activeProducto" />
        </section>
    </div>
</template>

<script>
    import carousel from "vue-owl-carousel";
    import { mapGetters } from "vuex";

    export default {
        components: { carousel },
        data() {
            return {
                result: null,
                items: 6,
                showModal: false,
                proveedores: null,
                tieneimg: true,
                tienelogo:true,
                activeProducto: {},
            }
        },
        mounted() {
            this.getProveedores();
        },
        computed: {
            ...mapGetters(["isLoggedIn"]),

            proveedoresChunk() {
                let chunks = [], // Array de proveedores + publis
                    len = this.items, // Cantidad de proveedores x chunk
                    i = 0, // separador
                    x = 0, // contador
                    n = this.proveedores.length; // total de proveedores

                while (i < n) {
                    chunks.push({
                        proveedores: this.proveedores.slice(i, (i += len)),
                        key: Math.random() * Date.now()
                    });
                    x++;
                }

                return chunks;
            }
        },
        methods: {

            getProveedores(){
                axios.get('/api/proveedores/home')
                    .then(res=>{
                        this.proveedores = res.data.data;
                    })
                    .catch(err=>console.log(err))
            },
            showModalFunc(producto){
                this.activeProducto = producto;
                this.showModal = true;
            }
        },

    }
</script>

<style scoped lang="scss">

    .que_vendemos{
        background-color: white;

        h2{
            color: #1595c3;
            font-weight: 200;
            font-size: 29px;
        }

        .proveedores-seccion{
            padding-left: 90px;
            padding-right: 90px;
        }

        .proveedor-card{

            height: 303px;
            border: none;
            border-radius: 0.25rem;
            background-color: #f7f7f7;
            transition: all ease-in-out 0.2s;

            .card-header{
                height: 15%;
                position: relative;
                border-bottom: none;
                border-top-left-radius: 0.25rem;
                border-top-right-radius: 0.25rem;
                background-color: #1595c3;

                h4{
                    color: white;
                    text-align: center;
                    font-weight: 600;
                    font-size: 19px;
                    margin-bottom:0;
                    transition: color ease-in-out 0.5s;
                }
                p{
                    color: whitesmoke;
                    font-size: 13px;
                    text-align: center;
                }
                .proveedor-logo{
                    height: 50px;
                    width: 75px;
                    background-color: white;
                    position: absolute;
                    bottom: -30px;
                    left: 0;
                    right: 0;
                    margin-right: auto;
                    margin-left: auto;
                    border-radius: 0.25rem;
                    border: 1px solid #ebebeb;

                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: contain;
                }
            }
            .separador{
                border-bottom: 1px solid #ebebeb;
            }

            .card-body{
                height: 78%;
                padding-bottom: 0;
                padding-left:5px;
                padding-right:5px;
                padding-top: 36px;

                .producto-imagen{
                    padding: 11px;
                }

                .img-cont{
                    height: 75px;
                    width: 100%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    border-radius: 0.25rem;
                }
            }


            &:hover{
                -webkit-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.3);
                -moz-box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.3);
                box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.3);

            }
        }
    }

    @media (max-width: 750px) {
        .que_vendemos {

            h2 {
                font-size: 25px;
            }

            .proveedores-seccion {
                padding-left: 10px;
                padding-right: 10px;
            }
        }

    }

</style>
