<template>
    <!-- <div id="vue-template-dropdown">
        <div class="dropd">
            <a @click="open = !open" class="trigger">
                {{opciones[0].label}}
                <b class="caret">
                </b>
                <i class="fas fa-chevron-down">
                </i>
            </a>
            <ul class="dropd-menu" :class="{'open': open}" v-if="open">
                <li v-for="(opcion) in opciones[1].opciones">
                    <a @click="handleClick(opcion)">
                        {{opcion.value}}
                    </a>
                </li>
            </ul>
        </div>
    </div> -->
    <div id="vue-template-dropdown">
        <div class="dropd" >
            <a class="trigger open">
                {{opciones[0].label}}<!-- Ayudas -->
                <b class="caret"> <!-- Espacio en blanco -->
                </b>
                <i class="fas fa-chevron-down"><!-- icono de flecha -->
                </i>
            </a>
            <ul class="dropd-menu open">
                <li v-for="(opcion) in opciones[1].opciones">
                    <a @click="handleClick(opcion)">
                        {{opcion.value}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';

    export default{
            data(){
                return {
                    selectedOpcion: {
                        type: Number,
                        default: null
                    },
                }
            },
        props: {
            open: {
                type: Boolean,
                default: false
            },
            emptyLabel: {
                type: String,
                default: 'Select'
            },
            opciones: {
                type: Array,
                required: true
            },
        },
            computed: {
                selectedValue: function () {
                    return this.selectedOpcion >= 0 ? this.opciones[this.selectedOpcion].value : this.emptyLabel
                }
            },
            methods: {
                handleClick: function (i) {
                    this.open = false;
                    this.$emit('change', i);
                }
            },
    }
</script>
<style scoped lang="scss">

    #vue-template-dropdown{

        .dropd{
            position: relative;
        }
        .dropd:hover .open{
            visibility: visible;
            opacity: 100;
        }
        .a:focus{
            color: #1b1e21;
        }

        .trigger{
            background-color: transparent;
            height: 30px;
            width: 40px;
            font-size: 13px;
            text-transform: uppercase;
            font-weight: 500;

            &:hover{
                color: #242424;
            }
        }

        .dropd-menu{
            visibility: hidden;
            height: auto;
            width: 230px;
            min-width: 180px;
            background-color: white;
            position: absolute;
            top: 18px;
            opacity: 0;
            right:-10px;
            border: 1px solid #ebebeb;
            border-radius: 0.25rem;
            padding: 5px;
            text-transform: none !important;
            font-weight: 400 !important;
            z-index: 1100;

            // &.open{
            //     opacity: 100%;
            //     transition: opacity ease-in-out 1s;
            // }

            a{
                text-transform: uppercase;
            }


            li{
                padding: 8px;
                border-bottom: 0.5px solid #ebebeb;

            }

            li:last-child{
                border-bottom: none;
            }


        }

    }

    @media (min-width: 1200px) {
        #vue-template-dropdown{
            .trigger{
                font-size: 14px;
            }
        }
    }
</style>