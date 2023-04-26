<template>
    <div class="container py-3">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-8 text-center">
                <div class="mt-2">
                    <ul class="mb-0 pagination justify-content-center">
                        <li class="page-item d-none d-sm-block"
                            @click.prevent="changePage(1)"
                            :class="current_page - 1 === 0 ? 'disabled' : ''">
                            <a class="page-link" href="#">Primera</a>
                        </li>
                        <li class="page-item d-none d-sm-block" v-for="page in pages_list"
                            @click.prevent="changePage(page.number)"
                            :key="page.number"
                            :class="current_page === page.number ? 'active' : ''">
                            <a class="page-link" href="#">{{page.number}}</a>
                        </li>
                        <li class="page-item d-none d-sm-block"
                            @click.prevent="changePage(last_page)"
                            :class="!last_page || current_page + 1 > last_page ? 'disabled' : ''">
                            <a class="page-link" href="#">Última</a>
                        </li>


                        <li class="page-item d-block d-sm-none"
                            @click.prevent="changePage(current_page - 1)"
                            :class="current_page - 1 === 0 ? 'disabled' : ''">
                            <a class="page-link" href="#">Anterior</a>
                        </li>
                        <li class="page-item d-block d-sm-none"
                            @click.prevent="changePage(current_page + 1)"
                            :class="current_page + 1 > last_page ? 'disabled' : ''">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>


                    </ul>
                </div>
            </div>
            <div class="d-none d-md-block col-sm-12 col-md-6 col-lg-4 form-inline justify-content-center">
                <div class="form-group" style="display: flex; margin-top: 7px;">
                    <label>Mostrar </label>
                    <select class="custom-select form-control" style="min-width: 50px; margin-left: 5px; margin-right: 5px;"
                            @change="changeShowing"
                            v-model="showing">
                        <option value="9">9</option>
                        <option value="15">15</option>
                        <option value="24">24</option>
                    </select>
                    <label> Items</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    /**
     * # INPUT
     * - last_page | required
     *
     * # OUTPUT
     * - changing_page
     * - searching
     * - changing_showing
     */
    export default {
        data() {
            return {
                showing:9,
                current_page:1,
                pages_list:[],
            }
        },
        mounted() {
            this.doPagesList();
        },
        watch:{
            last_page: function(oldVal,newVal){
                this.doPagesList();
            }
        },
        methods: {
            doPagesList(){
                // Reseteo la lista
                this.pages_list=[];

                // Agrego los items antes del actual
                if (this.current_page > 3){
                    for (let i=this.current_page; i>=this.current_page-2; i--){
                        this.pages_list.unshift({
                            number:i,
                        })
                    }
                } else {
                    for (let i=1; i<=this.current_page; i++){
                        this.pages_list.push({
                            number:i,
                        })
                    }
                }

                // Agrego los items despues del actual
                let rest = this.last_page - this.current_page;

                if (rest !== 0) {
                    // reasigno a la cantidad maxima de paginas por delante
                    rest = rest > 2 ? 2 : rest;

                    for (let i=this.current_page+1; i<=this.current_page+rest; i++){
                        this.pages_list.push({
                            number:i,
                        })
                    }
                }

            },

            changePage(number){
                if (number > 0 || number <= this.last_page()) {
                    this.current_page = number;
                    this.doPagesList();
                    this.$emit('changing_page',number);
                }
            },

            changeShowing(){
                this.current_page = 1;
                this.$emit('changing_showing',this.showing);
            },

            search(evt){
                this.$emit('searching',evt.target.value);
            }
        },
        props:['last_page']
    }
</script>

<style scoped lang="scss">

    .page-link{
        min-width: 2.6em;
        margin-right: .5em;
        text-align: center;
        border-radius: 4em;
        color: black;
    }
    .page-item:first-child .page-link {
        margin-left: 0;
    }
    .page-item:first-child .page-link,.page-item:last-child .page-link {
        margin-left: 0;
        border-radius: 4rem;
        border-radius: 4rem;
    }
    .form-inline label {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0;
    }

    .custom-select:focus {
        border-color: #1b4b72;
        outline: 0;
        box-shadow: none;
    }

    .active{

        a{
            background-color:  #1b4b72 !important;
        }
    }
</style>
