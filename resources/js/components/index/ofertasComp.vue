<template>
    <div>
        <!-- ofertas-->
        <section class="product_area mb-46">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Ofertas</h2>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    <article class="single_product" v-for="item in ofertas" :key="item.id">

                        <figure>
                            <div class="product_thumb mb-2">
                                    <img :src="item.imagesrc"  @error="imgDefault" alt="">

                                <div class="action_links">
                                    <ul>
                                        <li class="compare" v-if="isLoggedIn"><a href="#" title="Calculadora"><span class="ion-levels"></span></a></li>
                                        <li class="quick_button" v-if="isLoggedIn"><a @click="activeOferta=item" href="#" data-toggle="modal" data-target="#modal_box"  title="Ver Oferta"> <span class="ion-ios-search-strong"></span></a></li>
                                    </ul>
                                </div>

                                <div class="product_timing">
                                    <div :data-countdown="item.finaliza"></div>
                                </div>
                            </div>
                            <figcaption class="product_content" v-if="isLoggedIn">
                                <div class="price_box" v-if="item.precio > 0">
                                    <span class="old_price">${{item.precio}}</span>
                                    <span class="current_price" >${{(item.precio - (item.precio * item.descuento /100)).toFixed(2)}}</span>
                                </div>
                                <div class="price_box" v-else>
                                    <span class="old_price">${{item.productos[0].precio_actual}}</span>
                                    <span class="current_price" >${{(item.productos[0].precio_actual - (item.productos[0].precio_actual * item.descuento /100)).toFixed(2)}}</span>
                                </div>
                                <h3 class="product_name"><a @click="activeOferta=item" href="#" data-toggle="modal" data-target="#modal_box"  title="quick view">{{item.titulo}}</a></h3>
                            </figcaption>
                            <figcaption class="product_content" v-else>
                                <div class="price_box">
                                    <router-link tag="button" class="btn btn-block btn-sm btn-ingresar" to="/login">INGRESAR</router-link>
                                </div>
                                <h3 class="product_name"><a @click="activeOferta=item" href="#" data-toggle="modal" data-target="#modal_box"  title="quick view">{{item.titulo}}</a></h3>
                            </figcaption>
                        </figure>
                    </article>

                </div>
            </div>
        </section>

        <modal-home v-if="activeOferta" :item="activeOferta" @closeDialog="activeOferta = null"></modal-home>


    </div>
</template>

<script>
    import carousel from 'vue-owl-carousel';
    import { mapActions, mapGetters } from 'vuex';
    import mobileChecker from "../../mixins/mobileChecker";
    import modalHome from "./modales/modalHome";

    export default {
        components: { carousel , modalHome },
        mixins:[mobileChecker],
        data() {
            return {
                activeOferta: null,

                item : null,
                imgUrl: 'http://www.mlrepuestos.com.ar/images/productos/thumbs',

            }
        },
        computed: {
            ...mapGetters([
                'ofertas',
                'isLoggedIn',
            ]),
            total_vueltas:function(){
                let totalr = parseInt(this.ofertas.length);
                return  parseInt(totalr / 4);

            },
            ImageUrl(){
                //console.log(this.item);


            }
        },
        mounted() {

            if (!this.ofertas.length) {
                this.getOfertas();
            }
            setTimeout(() => {

                this.$nextTick(() => {
                    $(this.$el).find('.product_column5').on('changed.owl.carousel initialized.owl.carousel', function (event) {
                        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({

                        loop: true,
                        nav: true,
                        autoplay: false,
                        autoplayTimeout: 8000,
                        items: 5,
                        margin:20,
                        dots:false,
                        navText: ['<i class="ion-ios-arrow-left"></i>','<i class="ion-ios-arrow-right"></i>'],
                        responsiveClass:true,
                        responsive: {
                            0:{
                                items:1,
                            },
                            576:{
                                items:2,
                            },
                            768:{
                                items:3,
                            },
                            992:{
                                items:4,
                            },
                            1200:{
                                items:5,
                            },
                        }
                    });

                    /*---countdown activation---*/

                    $(this.$el).find('[data-countdown]').each(function() {
                        var $this = $(this), finalDate = $(this).data('countdown');
                        $this.countdown(finalDate, function(event) {
                            $this.html(event.strftime('<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">dias</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">horas</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">segs</div></div></div>'));

                        });
                    });
                });
            }, 2000);

        },
        methods: {
            ...mapActions(['getOfertas']),
            imgDefault(event){
                event.target.src = 'http://www.mlrepuestos.com.ar/images/productos/thumbs/1_thumb.png';
            },

            addToWishlist(item){
                axios.post('api/wishlist', item)
                    .then(res=>{
                        this.$noty.success(res.data.data)
                    })
                    .catch(err=>console.log(err))
            }


        },

    }
</script>

<style scoped lang="scss">

    .btn-ingresar{
        background-color: #4595c2;
        margin-top: 10px;
        color: white;
        font-size: 10px;
        font-weight: 500;
    }

    owl-carousel .owl-nav .owl-prev, .owl-carousel .owl-nav .owl-next, .owl-carousel .owl-dot {
        cursor: pointer;
        margin-left: -25px;
        margin-right: -20px;
        font-size: 30px;
    }
    .product_thumb {
        height: 186px;
    }
</style>
