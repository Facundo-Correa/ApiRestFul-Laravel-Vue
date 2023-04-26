<template>
    <div class="devolucionesygarantias" style="background-color: #ebebeb">
        <div class="container">
            <div class="banner">
                <h3>
                    Devoluciones y Garantías
                </h3>
                <img src="assets/img/empresa/devolution.png" class="banner-img" alt="">
            </div>
            <div class="row m-0">
                <div class="col-12 pre-cont">
                    <h5>
                        Queremos que te sientas 100% satisfecho/a por las compras que realices en nuestra
                        tienda por lo cual nuestros productos tienen garantía y te damos la posibilidad de hacer devoluciones,
                        te recomendamos leer las siguientes politicas.
                    </h5>
                </div>
                <div class="col-12 cont-condiciones pt-2 pb-5">
                    <h3>
                        No se aceptaran devoluciones de repuestos en las siguientes condiciones:
                    </h3>
                    <div class="row">
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> Sin el empaque original o dañado.</p></div>
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> Sin la etiqueta identificativa.</p></div>
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> En caso que la fecha de facturación del producto tenga mas de dos meses de antigüedad.</p></div>
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> Productos correspondientes a ofertas o promociones.</p></div>
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> Productos dañados por incorrecto armado, uso o mal trato.</p></div>
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> Los productos eléctricos importados no tienen garantía.</p></div>
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> Todos los productos tienen la garantía que ofrece el fabricante, quien determinara si corresponde el cambio del mismo al momento de efectuar el reclamo por falla de fabricación o vicios de materiales.</p></div>
                        <div class="col-12 condicion"><i class="fas fa-chevron-circle-right mr-2"></i><p> Las devoluciones deben enviarse con flete pago y deberán acordarse previamente con ML Repuestos.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import mobileChecker from "../mixins/mobileChecker";

    export default {
        mixins: [mobileChecker],
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

    .devolucionesygarantias{

        .pre-cont{
            padding: 25px;

            h5{
                color: rgba(55, 55, 55, 0.73);
                font-size: 17px;
                font-weight: 400;
            }
        }
        .cont-condiciones{
            padding: 25px;
        }

        .condicion{
            display: flex;
            flex-direction: row;
        }


    }

    @media (max-width: 767px) {

        .devolucionesygarantias{

            p{
                font-size: 15px;

            }

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

                h5{
                    color: rgba(55, 55, 55, 0.73);
                    font-size: 15px;
                    font-weight: 400;
                    line-height: 24px;
                }
            }

            .cont-condiciones{

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

        .devolucionesygarantias{

            h3{
                font-size: 19px;
                font-weight: 500;
                line-height: 20px;
                margin-bottom: 20px;

            }

            p{
                font-size: 17px;
                margin-bottom: 18px;
                width: 80%;
            }

            i.fa-chevron-circle-right{
                margin-top: 5px;
                color: #1595c4;
                font-size: 14px;

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
                    line-height: 30px;
                    width: 100%;
                    margin-bottom: 0;
                }

            }

        }

    }

</style>