<template>
    <div class="tycpage" style="background-color: #ebebeb">
        <div class="container">
            <div class="banner">
                <h3>
                    Condiciones Generales De Venta
                </h3>
                <img src="assets/img/empresa/tycicon.png" class="banner-img" alt="">
            </div>
            <div class="row m-0">
                <div class="col-12 pre-cont">
                    <h5>

                    </h5>
                </div>
                <div class="col-12 cont-tyc pt-2 pb-5">
                    <div class="row">
                        <div class="col-12 tyc-single"><i class="fas fa-chevron-circle-right mr-2"></i><p> Los precios están sujetos a variación sin previo aviso, siendo estos los que rijan al momento de facturación. Confirmar un pedido por la pagina NO da derecho al congelamiento del precio indicado.</p></div>
                        <div class="col-12 tyc-single"><i class="fas fa-chevron-circle-right mr-2"></i><p> Los descuentos y condiciones de venta podrán ser modificadas según comportamiento de pago o condiciones económicas vigentes.</p></div>
                        <div class="col-12 tyc-single"><i class="fas fa-chevron-circle-right mr-2"></i><p> No se despacharan pedidos de clientes considerados en mora y se suspenderá el servicio de pagina web.</p></div>
                        <div class="col-12 tyc-single"><i class="fas fa-chevron-circle-right mr-2"></i><p> Pedimos respetar nuestros horarios y tiempos de preparación de pedidos para poder cumplir ordenadamente brindando un servicio de calidad.</p></div>
                        <div class="col-12 tyc-single"><i class="fas fa-chevron-circle-right mr-2"></i><p> La mercadería viaja por cuenta y riesgo del comprador.</p></div>
                        <div class="col-12 tyc-single"><i class="fas fa-chevron-circle-right mr-2"></i><p> Las fotografías de los productos que se visualizan en nuestra pagina pueden no corresponder con la marca o diferir en detalles según el proveedor.</p></div>
                        <div class="col-12 tyc-single"><i class="fas fa-chevron-circle-right mr-2"></i><p> Todo reclamo debe efectuarse a las 48 Hs de recibida la mercadería, no se aceptaran reclamos realizados posteriormente.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                result: null
            }
        },
        mounted() {

        },
        computed: {},
        methods: {},

    }
</script>

<style scoped lang="scss">

    .tycpage{


        .pre-cont{
            padding: 25px;

            h5{
                color: rgba(55, 55, 55, 0.73);
                font-size: 17px;
                font-weight: 400;
            }
        }

        .cont-tyc{
            padding: 25px;
        }

        .tyc-single{
            display: flex;
            flex-direction: row;
        }

    }

    @media (max-width: 767px) {

        .tycpage{


            .banner{
                height: 180px;
                display: flex;
                background-color: #1595c4;
                padding: 25px;
                flex-direction: column-reverse;

                h3{
                    color: #ebebeb;
                    font-size: 28px;
                    font-weight: 400;
                    line-height: 30px;
                    width: 100%;
                    margin-bottom: 0;
                }

                .banner-img{
                    height: 50px;
                    width: 50px;
                    margin-bottom: 18px;

                }

            }

            .pre-cont{
                padding: 25px;
                padding-bottom: 5px;

                h5{
                    color: rgba(55, 55, 55, 0.73);
                    font-size: 17px;
                    font-weight: 400;
                    line-height: 26px;
                }
            }

            .cont-tyc{

                h3{
                    font-size: 16px;
                    font-weight: 500;
                    margin-bottom: 15px;
                    line-height: 22px;
                }

                i.fa-chevron-circle-right{
                    margin-top: 4px;
                    color: #1595c4;
                    font-size: 15px;

                }

                p{
                    font-size: 14px;
                    margin-bottom: 10px;
                }
            }



        }
    }


    @media (min-width: 768px) {

        .tycpage{

            p{
                font-size: 17px;
                margin-bottom: 18px;
                width: 80%;
            }

            .banner{
                height: 170px;
                display: flex;
                background-color: #1595c4;
                padding: 25px;
                flex-direction: column-reverse;

                .banner-img{
                    height: 46px;
                    width: 46px;
                    margin-bottom: 15px;

                }

                h3{
                    align-self: end;
                    color: #ebebeb;
                    font-size: 29px;
                    font-weight: 400;
                    width: 100%;
                    margin-bottom: 0;
                }

            }

            i.fa-chevron-circle-right{
                margin-top: 5px;
                color: #1595c4;
                font-size: 14px;

            }



        }

    }


</style>