<template>
    <div >
        <div class="sticky_header_area sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo">
                            <router-link to="/" class="nav-link"><img src="assets/img/logo/ml-repuestos-logo.png" alt=""></router-link>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="main_menu menu_two menu_position text-right">
                            <nav id="mainnav">
                                <ul v-if="!isLoggedIn">
                                    <li class="mega_items">
                                        <router-link :to="{name:'home'}" class="nav-link">Home</router-link>
                                    </li>
                                    <li class="mega_items">
                                        <a href="#quevendemos" class="nav-link">Que Vendemos</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="#servicios" class="nav-link">Servicios</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="#empresa" class="nav-link">Historia</a>
                                    </li>
                                    <li class="mega_items" >
                                        <router-link to="/login" class="nav-link">Consultas</router-link>
                                    </li>
                                    <li class="mega_items">
                                        <a class="select-ayuda nav-link mr-3">
                                            <vue-dropd :opciones="ayuda" @change="ayudaPush"></vue-dropd>
                                        </a>
                                    </li>
                                </ul>
                                <ul v-if="isLoggedIn">
                                    <li class="mega_items">
                                        <router-link :to="{name:'home'}" class="nav-link">Home</router-link>
                                    </li>
                                    <li class="mega_items" >
                                        <router-link to="/login" class="nav-link">Productos</router-link>
                                    </li>
                                    <li class="mega_items"  @click="reload">
                                        <router-link to="/login" class="nav-link">Ofertas</router-link>
                                    </li>
                                    <li class="mega_items">
                                        <a href="#" @click.prevent="iframe = 'https://pedidos.mlrepuestos.com.ar:8083/Login.aspx'" title="Acceda a su Cta. Cte.">Cuenta Corriente</a>
                                    </li>
                                    <li class="mega_items">
                                        <a class="select-ayuda nav-link mr-3">
                                            <vue-dropd :opciones="ayuda" @change="ayudaPush"></vue-dropd>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <modal-cuenta-corriente :item="iframe" v-if="iframe" @close="iframe = null" />
            </div>
        </div>
    </div>
</template>

<script>

    import { mapGetters } from "vuex";
    import '../../plugins/smoothScrolling.js';
    import '../../plugins/offset.js';

    export default {
        data() {
            return {
                iframe: null,
                ayuda: [
                    {
                        value:'Preguntas Frecuentes',
                        link:'preguntasfrecuentes'
                    },
                    {
                        value:'Condiciones Generales',
                        link:'tycpage'
                    },
                    {
                        value:'Devoluciones y Garantías',
                        link:'devolucionesygarantias'
                    }
                ],
            }
        },
        computed: {
            ...mapGetters(["isLoggedIn"])
        },
        mounted() {
            this.smoothScrolling({
                url : [
                    '/',
                    '/home'
                ],
                urlMaxLenght: 20,
                offset: -30,
                selector : $('#mainnav .mega_items a')
            });
        },
        props: [],
        methods: {
            smoothScrolling(opt){
                if (!opt.url) opt.url = '/home';
                if (!opt.urlMaxLenght) opt.urlMaxLenght = 20;
                if (!opt.offset) opt.offset = 0;
                if (opt.selector) {
                    opt.url.forEach(function (a) {
                        if (window.location.pathname == a) {
                            opt.selector.click(function (e) {
                                if ($(this).attr('href').length < 20) {
                                    e.preventDefault();
                                    $('html,body').animate({scrollTop: $($(this).attr('href')).offset().top - opt.offset},'slow');
                                }
                            });
                        }

                    })
                } else {
                    //console.log('## fma.smoothScrolling ## selector is not defined!')
                }
            },
            ayudaPush(res){
                this.$router.push({ name: res.link});
            },
            reload(){
               // console.log('diste clickkkkkkkkkkkkkkkkkk');
            }
        },
    }
</script>

<style scoped lang="scss">

    .select-ayuda{

        .sel-ayuda {
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            border: 2px solid red;

            &:hover{
                color: #242424;
            }
        }

    }

    @media (min-width: 768px) {
        .col-logo-nav{
            width: 15%;
        }
        .col-menu-nav{
            width: 85%;
        }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .col-menu-nav{
            .mega_items{
                margin-right: 22px;
            }
        }
    }
</style>
