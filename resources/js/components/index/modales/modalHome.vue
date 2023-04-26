<template>
    <div>
        <!-- modal area start-->
        <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true" v-if="item">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit('closeDialog')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="modal_tab">
                                        <div class="tab-content product-details-large">
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product1.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product3.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                                <div class="modal_tab_img">
                                                    <a href="#"><img src="assets/img/product/product5.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal_tab_button">
                                            <ul class="nav product_navactive owl-carousel" role="tablist">
                                                <li >
                                                    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/product/product1.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/product/product2.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/product/product3.jpg" alt=""></a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/product/product5.jpg" alt=""></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <div class="modal_right">
                                        <div class="modal_title mb-10">
                                            <h2>{{ item.titulo }}</h2>
                                        </div>
                                        <div v-if="isLoggedIn">
                                            <div class="modal_price mb-10" v-if="item.precio > 0">
                                                <span class="current_price" >${{(item.precio - (item.precio * item.descuento /100)).toFixed(2)}}</span>
                                                <span class="old_price">${{item.precio}}</span>
                                            </div>
                                            <div class="modal_price mb-10" v-else>
                                                <span class="current_price" >${{(item.productos[0].precio_actual - (item.productos[0].precio_actual * item.descuento /100)).toFixed(2)}}</span>
                                                <span class="old_price">${{item.productos[0].precio_actual}}</span>
                                            </div>
                                        </div>
                                        <div class="modal_description mb-15">
                                            <p>{{ item.descripcion}}</p>
                                        </div>
                                        <div  class="modal_social" style="width: 200px; height: 80px; position: relative">
                                            <h2>La oferta finaliza en:</h2>
                                            <div class="product_timing">
                                                    <div :data-countdown="item.finaliza">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal area end-->
    </div>
</template>
<script>
    import { mapActions, mapGetters } from 'vuex';

    export default {

        name: 'modalHome',

        props: ['item'],

        computed: {
            ...mapGetters(['isLoggedIn'])
        },

    mounted(){
        $(this.$el).find('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">dias</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">horas</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">segs</div></div></div>'));

            });
        });
    }

    }

</script>


<style scoped lang="scss">


</style>
