<template>
    <div id="index" style="background-color: #ebebeb">
        <div class="container-fluid p-0">
            <template>
                <div class="container py-4">
                    <oferta-portada-comp v-if="portada" :item="portada">  </oferta-portada-comp>
                    <ofertas-comp></ofertas-comp>
                </div>
            </template>
        </div>
    </div>
</template>


<script>
    import mobileChecker from "../mixins/mobileChecker";
    import ofertaPortadaComp from "../components/ofertas/ofertaPortadaComp";

    export default {
        data() {
            return {
                portada: null,
            }
        },
        mixins:[mobileChecker],
        mounted() {
            this.getPortada();

        },
        props: [],
        methods: {
            getPortada(){
                axios.get('api/portada/'+ this.$route.query.id)
                    .then(res=>{
                        this.portada = res.data.data[0] ;
                      //console.log( this.portada )

                    })
                    .catch(err=>console.log(err));

            },
            activarCountdown(){
                $('[data-countdown]').each(function() {
                    var $this = $(this), finalDate = $(this).data('countdown');
                    $this.countdown(finalDate, function(event) {
                        $this.html(event.strftime('<div class="countdown_area"><div class="single_countdown"><div class="countdown_number">%D</div><div class="countdown_title">days</div></div><div class="single_countdown"><div class="countdown_number">%H</div><div class="countdown_title">hours</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div class="countdown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="countdown_title">secs</div></div></div>'));

                    });
                });
            }
        },
    }
</script>

<style scoped lang="scss">


</style>
