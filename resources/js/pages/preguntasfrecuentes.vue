<template>
    <div class="preguntasfrecuentes" style="background-color: #ebebeb">
        <div class="container">
            <div class="banner">
                <h3>
                    Preguntas Frecuentes
                </h3>
                <img src="assets/img/empresa/faqicon.png" class="banner-img" alt="">
            </div>
            <div class="row m-0">
                <div class="col-12 pre-cont">
                    <h5>
                        Para obtener una respuesta inmediata, podés ver las siguientes preguntas frecuentes,
                        donde econtrarás información sobre las cuestiones mas consultadas.
                    </h5>
                </div>
                <div class="col-12 cont-faq pt-2 pb-5">
                    <div class="row">
                        <div class="col-12 py-3 faq-area" v-for="f in faq">
                            <div class="row m-0">
                                <div class="col-12 px-0 pregunta">
                                    <div class="flag"><div class="in-flag">P.</div></div>
                                    <span>{{f.pregunta}}</span>
                                </div>
                                <div class="col-12 px-0 respuesta">
                                    <div class="flag"><div class="in-flag">R.</div></div>
                                    <span>{{f.respuesta}}</span>
                                </div>
                            </div>
                        </div>
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
                result: null,
                faq:{
                    1: {id:1,
                        pregunta:'Venden al publico?',
                        respuesta:'Solo vendemos al gremio.'
                    },
                    2: {id:2,
                        pregunta:'Cual es el monto minimo de compra?',
                        respuesta:'El monto minimo de compra es de $12000.-'
                    },
                    3: {id:3,
                        pregunta:'Siempre el pedido minimo debe ser de $12000?',
                        respuesta:'Solo lo requerimos para realizar la primer compra.'
                    },
                    4: {id:4,
                        pregunta:'Tienen viajantes en la zona?',
                        respuesta:'Unicamente trabajamos mediante la venta online o en forma presencial en nuestro salón de ventas, podes contactarnos para recibir el asesoramiento necesario.'
                    },
                    5: {id:5,
                        pregunta:'Tienen whats app?',
                        respuesta:'Si, el numero es +054 9 11 3060 7993'
                    },
                    6: {id:6,
                        pregunta:'Que formas de pago utilizan?',
                        respuesta:'Aceptamos todas las formas de pago (Transferencias bancarias – Mercado pago – Contrarrembolso – Tarjetas)'
                    },
                    7: {id:7,
                        pregunta:'Como envían los pedidos al interior y cuanto me sale?',
                        respuesta:'Se realizan semanalmente a todo el país por el transporte que Ud. nos indique y el costo de acuerdo al tarifario de dicho transporte (aproximadamente el 4 % del valor declarado)'
                    },
                    8: {id:8,
                        pregunta:'Los precios que veo son finales?',
                        respuesta:'Los precios que se muestran en la pagina NO incluyen IVA y se les debe aplicar el descuento comercial asignado según condición de venta.'
                    },
                    9: {id:9,
                        pregunta:'Hacen descuento por cantidad?',
                        respuesta:'Manejamos descuentos preferenciales para operaciones puntuales.'
                    },
                    10: {id:10,
                        pregunta:'Puedo descargar una lista en Excel?',
                        respuesta:'Si, desde la pagina haciendo click en el botón descargar lista. Considera que de esta forma no tenes los precios actualizados.'
                    },
                    11: {id:11,
                        pregunta:'No tengo buena señal de internet, como hago para hacerles un pedido?',
                        respuesta:'Podes hacerlo con la lista Excel y luego enviarlo por mail.'
                    },
                    12: {id:12,
                        pregunta:'No entiendo que son los artículos con el semáforo en color azul.',
                        respuesta:'Son los artículos que no tenemos en stock y solo se venden por pedido, al momento de confirmar la compra le indicaremos el tiempo de espera para recibirlo.'
                    },
                    13: {id:13,
                        pregunta:'Olvide o quiero recuperar mi contraseña, como hago?',
                        respuesta:'Al ingresar, debajo hay un botón que dice “olvide mi contraseña” presiónalo y segui las instrucciones.'
                    },
                    14: {id:14,
                        pregunta:'Cuales son las cosas que mas se venden?',
                        respuesta:'Te sugerimos te comuniques con nosotros para recibir asesoramiento.'
                    },
                    15: {id:15,
                        pregunta:'Que horarios tienen?',
                        respuesta:'De lunes a viernes de 8.30 a 14 y de 15 a 18Hs'
                    },
                    16: {id:16,
                        pregunta:'Que son los descuentos puntos?',
                        respuesta:'Cada vez que realizas una compra por la pagina sumas puntos que se transforman en descuentos en tus próximas compras. Los puntos tienen vencimiento.'
                    },
                    17: {id:17,
                        pregunta:'Que pasa si los canjeo por un articulo que no hay en stock?',
                        respuesta:'En ese caso los perdes.'
                    }
            }
            }
        },
        mounted() {

        },
        computed: {},
        methods: {},

    }
</script>

<style scoped lang="scss">

    .preguntasfrecuentes{


        .pre-cont{
            padding: 25px;

            h5{
                color: rgba(55, 55, 55, 0.73);
                font-size: 17px;
                font-weight: 400;
            }
        }

        .cont-faq{
            padding: 25px;
        }

    }

    @media (max-width: 767px) {

        .preguntasfrecuentes{


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

            .cont-faq{

                .faq-area{

                    .pregunta{
                        display: flex;
                        flex-direction: row;
                        background-color: white;
                        align-items: center;

                        .flag{
                            padding: 0;
                            height: 100%;
                            width: 45px;
                            border-left: 5px solid #1595c4;
                            font-size: 35px;
                            color:#1595c4;
                            display: flex;
                            align-items: center;
                            justify-content: center;

                            .in-flag{
                                padding: 10px;
                                padding-right:0;
                                text-align: right;
                            }
                        }
                        span{
                            font-size: 15px;
                            font-weight: 600;
                            padding: 12px;
                            padding-left: 15px;
                        }
                    }
                    .respuesta{
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        .flag{
                            padding: 0;
                            height: 100%;
                            width: 45px;
                            font-size: 35px;
                            border-left: 5px solid rgba(55, 55, 55, 0.73);
                            color: rgba(55, 55, 55, 0.73);
                            display: flex;
                            align-items: center;
                            justify-content: center;

                            .in-flag{
                                padding: 10px;
                                padding-right:0;
                                text-align: right;
                            }
                        }
                        span{
                            font-size: 15px;
                            font-weight: 400;
                            padding: 12px;
                            padding-left: 15px;
                            color: rgba(55, 55, 55, 0.73);
                        }
                    }
                }
            }

        }
    }


    @media (min-width: 768px) {

        .preguntasfrecuentes{

            .banner{
                height: 170px;
                display: flex;
                background-color: #1595c4;
                padding: 25px;
                flex-direction: column-reverse;

                .banner-img{
                    height: 44px;
                    width: 44px;
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

            .cont-faq{

                .faq-area{

                    .pregunta{
                        display: flex;
                        flex-direction: row;
                        background-color: white;
                        align-items: center;

                        .flag{
                            padding: 0;
                            height: 100%;
                            width: 45px;
                            border-left: 5px solid #1595c4;
                            font-size: 40px;
                            color:#1595c4;
                            display: flex;
                            align-items: center;
                            justify-content: center;

                            .in-flag{
                                padding: 10px;
                                padding-right:0;
                                text-align: right;
                            }
                        }
                        span{
                            font-size: 16px;
                            font-weight: 600;
                            padding: 12px;
                            padding-left: 15px;
                        }
                    }
                    .respuesta{
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        .flag{
                            padding: 0;
                            height: 100%;
                            width: 45px;
                            font-size: 40px;
                            border-left: 5px solid rgba(55, 55, 55, 0.73);
                            color: rgba(55, 55, 55, 0.73);
                            display: flex;
                            align-items: center;
                            justify-content: center;

                            .in-flag{
                                padding: 10px;
                                padding-right:0;
                                text-align: right;
                            }
                        }
                        span{
                            font-size: 16px;
                            font-weight: 400;
                            padding: 12px;
                            padding-left: 15px;
                            color: rgba(55, 55, 55, 0.73);
                        }
                    }
                }
            }

            p{
                width: 80%;
                font-size: 14px;
            }


        }

    }

</style>