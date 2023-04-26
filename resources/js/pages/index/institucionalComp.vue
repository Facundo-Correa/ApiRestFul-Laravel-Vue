<template>
    <div>
        <!-- noticias y marcas -->
        <section class="custom_product_area">
            <div class="container pb-4">
                <div class="row">
                    <div class="col-lg-4 col-md-10"> <!-- noticias -->
                        <!--featured product area-->
                        <div class="small_product_area" v-if="rss != null">
                            <div class="section_title">
                                <h2><span> Noticias </span>
                                    </h2>
                                <h5 class="noticias-gentileza" >Gentileza de <a target="_blank" v-bind:href="rss.link.data">{{rss.title.data}}</a></h5>
                            </div>

                            <div></div>

                            <div class="noticia-cont" v-if="rss.items">
                                <article class="noticia-single" v-for="noticia in rss.items.slice(0, 7)">
                                    <div class="row news-title m-0">
                                        <div class="col-12 col-title px-2">
                                            <h3><a v-bind:href="noticia.child.link.data" target="_blank">{{ noticia.child.title.data }}</a></h3>
                                        </div>
                                    </div>
                                    <div class="row top-news m-0">
                                        <div class="col-5 foto" v-bind:style="{backgroundImage: 'url('+ noticia.child.img +')'}">
                                        </div>
                                        <div class="col-7 texto px-2 py-1">
                                            <span v-if="noticia.child.description.length > 1">{{ noticia.child.description.substring(0,160)+'...' }}</span>
                                        </div>
                                    </div>
                                </article>
                            </div>

                            <!--<div class="small_product_container small_product_active">-->
                                <!--<article class="single_product" v-for="noticia in rss.items">-->
                                    <!--<figure>-->
                                        <!--<div class="product_thumb">-->
                                            <!--<a class="primary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>-->
                                            <!--<a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>-->
                                        <!--</div>-->
                                        <!--<figcaption class="product_content">-->

                                            <!--<div class="price_box">-->
                                                <!--<span class="current_price">{{ noticia.child.title.data }}</span>-->
                                            <!--</div>-->
                                            <!--<h3 class="product_name"><a href="product-details.html">Sit voluptatem rhoncus sem lectus</a></h3>-->
                                            <!--<div class="product_ratings">-->
                                                <!--<ul>-->
                                                    <!--<li><a href="#"><i class="ion-android-star-outline"></i></a></li>-->
                                                    <!--<li><a href="#"><i class="ion-android-star-outline"></i></a></li>-->
                                                    <!--<li><a href="#"><i class="ion-android-star-outline"></i></a></li>-->
                                                    <!--<li><a href="#"><i class="ion-android-star-outline"></i></a></li>-->
                                                    <!--<li><a href="#"><i class="ion-android-star-outline"></i></a></li>-->
                                                <!--</ul>-->
                                            <!--</div>-->
                                        <!--</figcaption>-->
                                    <!--</figure>-->
                                <!--</article>-->

                            <!--</div>-->
                        </div>
                        <!--featured product end-->
                    </div>
                    <div class="col-lg-8 col-md-12"> <!-- marcas -->
                        <!--featured product area-->
                        <div class="small_product_area">
                            <div class="section_title">
                                <h2><span> Marcas </span></h2>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-4">
                                        <carousel :autoplay="true"
                                                  :nav="false"
                                                  :autoplayHoverPause="true"
                                                  :dots="false"
                                                  :loop="true"
                                                  :autoplaySpeed="5000"
                                                  :smartSpeed="5000"
                                                  :autoplayTimeout="4000"
                                                  :center="true"
                                                  :items="1"
                                                  class="carousel-marcas py-4"
                                        >
                                            <div class="slide">
                                                <img src="../../../../public/assets/img/marcas/1.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                            <div class="slide">
                                                <img src="../../../../public/assets/img/marcas/2.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                            <div class="slide">
                                                  <img src="../../../../public/assets/img/marcas/3.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                            <div class="slide">
                                                <img src="../../../../public/assets/img/marcas/4.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                            <div class="slide">
                                                <img src="../../../../public/assets/img/marcas/5.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                            <div class="slide">
                                                <img src="../../../../public/assets/img/marcas/6.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                            <div class="slide">
                                                <img src="../../../../public/assets/img/marcas/7.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                            <div class="slide">
                                                <img src="../../../../public/assets/img/marcas/8.jpg" alt="" style="width: 100%; height: 140px">
                                            </div>
                                        </carousel>

                                </div>
                            </div>

                            <div class="section_title mb-2 mt-4">
                                <h2><span> Fabricantes </span></h2>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="fabricantes-cont">
                                        <span class="fabricante-title">33</span> - Rayos - Aros de llanta<br>
                                        <span class="fabricante-title">ACUARIUS</span> - Opticas<br>
                                        <span class="fabricante-title">ALEN CREUSO</span> - Engranajes - Cigueñales<br>
                                        <span class="fabricante-title">ALFA</span> - Juntas - Orrings<br>
                                        <span class="fabricante-title">AIP</span> - Pistones - Aros- Valvulas<br>
                                        <span class="fabricante-title">ALFREDO</span> - Resortes<br>
                                        <span class="fabricante-title">AMAL</span> - Carburadores<br>
                                        <span class="fabricante-title">APOLO</span> - Bobinas<br>
                                        <span class="fabricante-title">A.R.</span> - Discos de embrague<br>
                                        <span class="fabricante-title">ARB</span> - Rulemanes<br>
                                        <span class="fabricante-title">ASD</span> - Filtros de aire<br>
                                        <span class="fabricante-title">BAJAJ</span> - Repuestos originales<br>
                                        <span class="fabricante-title">BRN</span> - Cilindros - Porta coronas - Engranajes<br>
                                        <span class="fabricante-title">BUHO</span> - Repuestos varios<br>
                                        <span class="fabricante-title">CATALANO</span> - Coronas - Piñones<br>
                                        <span class="fabricante-title">CASBER</span> - Repuestos varios<br>
                                        <span class="fabricante-title">CHAMPION</span> - Bujias<br>
                                        <span class="fabricante-title">CICLOMEJOR</span> - Carburadores<br>
                                        <span class="fabricante-title">COMETA</span> - Soportes y manijas de freno y embrague<br>
                                        <span class="fabricante-title">CORVEN</span> - Repuestos originales<br>
                                        <span class="fabricante-title">DE DION</span> - Filtros de aire<br>
                                        <span class="fabricante-title">DELTA</span> - Trajes para lluvia<br>
                                        <span class="fabricante-title">DANIDREA</span> - Repuestos varios<br>
                                        <span class="fabricante-title">DZE</span> - Bobinas - Platinos<br>
                                        <span class="fabricante-title">EDAR</span> - Manijas de freno y embrague<br>
                                        <span class="fabricante-title">FAG</span> - Rulemanes<br>
                                        <span class="fabricante-title">FAIRING</span> - Parabrisas<br>
                                        <span class="fabricante-title">FAR</span> - Amortiguadores - Suspensiones<br>
                                        <span class="fabricante-title">FLYNN</span> - Repuestos varios<br>
                                        <span class="fabricante-title">FRASLE</span> - Pastillas y zapatas de freno<br>
                                        <span class="fabricante-title">FUNDEMAP</span> - Llantas<br>
                                        <span class="fabricante-title">G&G</span> - Barrales de suspension<br>
                                        <span class="fabricante-title">GUERRERO</span> - Repuestos originales<br>
                                        <span class="fabricante-title">GONTERO</span> - Aros de piston<br>
                                        <span class="fabricante-title">HB</span> - Espejos<br>
                                        <span class="fabricante-title">HD</span> - Pastillas de freno<br>
                                        <span class="fabricante-title">HIDRAULICA ARGENTINA</span> - Palancas - Engranajes<br>
                                        <span class="fabricante-title">HORN FORTUNE</span> - Cubiertas<br>
                                        <span class="fabricante-title">IMPERIAL</span> - Camaras<br>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="fabricantes-cont">
                                        <span class="fabricante-title">IPLP</span> - Silenciadores - Caballetes - Caños posa pie <br>
                                        <span class="fabricante-title">IZUMI</span> - Cadenas <br>
                                        <span class="fabricante-title">JC</span> - Juntas<br>
                                        <span class="fabricante-title">JETSON</span> - Silenciadores<br>
                                        <span class="fabricante-title">KENDA</span> - Camaras - Cubiertas<br>
                                        <span class="fabricante-title">KOMPRESSOR</span> - Aros de piston<br>
                                        <span class="fabricante-title">LA COLMENA</span> - Cables de comando - Tripas de velocimetro<br>
                                        <span class="fabricante-title">LOCTITE</span> - Adhesivos y productos especiales<br>
                                        <span class="fabricante-title">MAGNETRON</span> - Estatores - Bobinas de alta<br>
                                        <span class="fabricante-title">MANN FILTER</span> - Filtros de aceite, aire y combustible<br>
                                        <span class="fabricante-title">MDA</span> - Manubrios - Puños<br>
                                        <span class="fabricante-title">METALIC</span> - Mazas de rueda<br>
                                        <span class="fabricante-title">MOTOBOR</span> - Silentblock<br>
                                        <span class="fabricante-title">MOTOMEL</span> - Repuestos originales<br>
                                        <span class="fabricante-title">MOTUL</span> - Aceites<br>
                                        <span class="fabricante-title">NAYASA</span> - Cubiertas y camaras<br>
                                        <span class="fabricante-title">NGK</span> - Bujias<br>
                                        <span class="fabricante-title">NTN</span> - Rulemanes<br>
                                        <span class="fabricante-title">OSRAM</span> - Lamparas<br>
                                        <span class="fabricante-title">PARAMOTOS</span> - Plasticos de carroceria<br>
                                        <span class="fabricante-title">PIETCARD</span> - Rectificadores y reguladores de voltaje<br>
                                        <span class="fabricante-title">PLUS MOTORI</span> - Aceites - Lubricantes<br>
                                        <span class="fabricante-title">REVIGAL</span> - Cosmetica de la moto<br>
                                        <span class="fabricante-title">RISTOBAT</span> - Baterias<br>
                                        <span class="fabricante-title">ROUSER</span> - Repuestos originales<br>
                                        <span class="fabricante-title">RTO</span> - Retenes<br>
                                        <span class="fabricante-title">SAKURA</span> - Filtros de combustible <br>
                                        <span class="fabricante-title">SCAR</span>- Retenes - Diafragmas - Tensores y Guias - Acoples admision<br>
                                        <span class="fabricante-title">Standard</span> - Repuestos varios de calidad<br>
                                        <span class="fabricante-title">STLU</span> - Faros - Acrilicos<br>
                                        <span class="fabricante-title">TORK</span> - Silenciadores - Caballetes - Caños posa pie - Porta equipajes<br>
                                        <span class="fabricante-title">VALPLAST</span> - Faros - Acrilicos<br>
                                        <span class="fabricante-title">VC</span> - VAM - Plasticos varios<br>
                                        <span class="fabricante-title">WESTER</span> - Puños - Plasticos de carroceria<br>
                                        <span class="fabricante-title">YAMAHA</span> - Repuestos originales <br>
                                        <span class="fabricante-title">YAMALUBE</span> - Aceite<br>
                                        <span class="fabricante-title">ZANELLA</span> - Repuestos originales
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--featured product end-->
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script>
    import carousel from 'vue-owl-carousel';

    export default {
        components: { carousel },
        data() {
            return {
                rss: null,
            }
        },
        mounted() {
            this.getNoticias();
        },
        props: [],
        methods: {

            getNoticias(){
                axios.get('api/noticias/home')
                    .then(res=>{
                        this.rss = res.data.data;
                    })
                    .catch(err=>console.log(err))
            }
        },
    }
</script>

<style scoped lang="scss">

    .carousel-marcas{
        background-image: url('../../../../public/assets/img/marcas/fondo-azul-marcas1.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 0.25rem;
    }

    .fabricantes-cont{
        font-size: 13px;
        padding: 5px 10px 5px 10px;
        width: 100%;
        float: left;
        border: 1px solid #1595c3;
        border-radius: 0.25rem;
        background-color: white;

        .fabricante-title{
            font-size: 16px;
            font-weight: 500;
            color: #1595c3;
        }

    }

    .section_title{
        position: relative;

        .noticias-gentileza{
            position: absolute;
            top: 25px;
            left: 0;
            font-size: 13px;
            font-weight: 400;
            text-align: left;
            color: #505050;

            a{

            }
        }
    }

    .noticia-single{
        width: 100%;
        height: 170px;
        background-color: white;
        border-radius: 0.25rem;
        margin-bottom: 20px;
        border: 1px solid white;

        &:hover{
            border-color: #ebebeb;
        }

        .top-news{
            height: 70%;
        }

        .news-title{
            height: 30%;
            .col-title{
                height: 100%;
                background-color: #1595c3;
                color: white;
                display: flex;
                border-top-left-radius: 0.25rem;
                border-top-right-radius: 0.25rem;
            }

            h3{
                font-size: 15px;
                font-weight: 500;
                line-height: 21px;
                margin-top:auto;
                margin-bottom: auto;

                a:hover{
                    color: black;
                }

            }
        }

        .foto{
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-bottom-left-radius: 0.25rem;

            img{
                height: 100%;
                width: auto;
                max-width: 100%;
            }
        }

        .texto{
            height: 100%;
            font-size: 13px;
            line-height: 17px;
            color: rgba(36, 36, 36, 0.91);

        }


    }


</style>
