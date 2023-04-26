<template>
    <div class="noticias_home py-5">
        <div class="row" v-if="rss.items">
            <div class="col-12 title-section pb-4">
                <h2>
                    Noticias
                </h2>
                <h5 class="noticias-gentileza" >Gentileza de <a target="_blank" v-bind:href="rss.link.data">{{rss.title.data}}</a></h5>

            </div>
            <div class="col-12">
                <carousel
                        :nav="false"
                        :dots="true"
                        :loop="true"
                        :smartSpeed="1000"
                        :center="true"
                        :responsive="{
                            0: {
                              items: 1
                            },
                            768: {
                              items: 2
                            },
                            992: {
                              items: 3
                            },
                            1200: {
                              items: 3
                            }
                          }"
                        class="blog_carousel blog_column4"
                >
                    <div class="col-lg-3 noticia-space" v-for="noticia in rss.items">
                        <article class="single_blog">
                            <figure>
                                <figcaption class="blog_content pt-1">
                                    <div class="row m-0 carta-noticia">
                                        <div class="col-12 noticia-body">
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <h3><a v-bind:href="noticia.child.link.data" target="_blank">{{ noticia.child.title.data }}</a></h3>
                                                </div>
                                                <div class="col-12">
                                                    <span v-if="noticia.child.description.length > 1">{{ noticia.child.description.substring(0,180)+'...' }}</span>
                                                </div>
                                                <div class="col-12">
                                                    <a class="btn btn-sm" v-bind:href="noticia.child.link.data" target="_blank">
                                                        VER ARTICULO
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 noticia-header" v-bind:style="{backgroundImage: 'url('+ noticia.child.img +')'}">

                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </carousel>
            </div>
        </div>
    </div>
</template>

<script>
    import carousel from "vue-owl-carousel";

    export default {
        components: { carousel },
        data() {
            return {
                result: null,
                rss:{},
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


    .noticias_home{

        .title-section{
            padding-left: 40px;

            .noticias-gentileza{
                position: absolute;
                top: 25px;
                left: 0;
                font-size: 13px;
                font-weight: 400;
                text-align: left;
                color: #505050;
                padding-left: 40px
            }

            h2{
                font-size: 20px;
                line-height: 17px;
                font-weight: 500;
                display: inline-block;
                margin-bottom: 0;
                position: relative;
                text-transform: capitalize;
            }
        }

        .separador{
            border-bottom: 1px solid whitesmoke;
            width: 100%;
        }

        .noticia-space{


            .carta-noticia{
                height: 350px;
                padding: 10px;
                border-radius: 0.25rem;

                .noticia-header{
                    height: 45%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-color: transparent;
                }

                .noticia-body{
                    height: auto;
                    background-color: white;
                    padding: 15px;
                    line-height: 19px;
                    text-align: left;

                    a.btn{
                        margin-top: 8px;
                        background-color: #fc7509;
                        color: white;
                        transition: background-color ease-in-out 0.2s;
                        font-size: 13px;
                        border-radius: 0;

                        &:hover{
                            background-color: #1595c3;
                        }
                    }

                }
            }
        }
    }
</style>