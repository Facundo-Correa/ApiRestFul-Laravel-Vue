<template>
    <div class="row py-5 justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="container">
                        <h2>Error 404!</h2>
                        <h3 class="py-3 font-weight-normal">Lo Sentimos la página que esta buscando no existe.</h3>
                        <button class="btn btn-primary" @click="$router.push({name:'home'})">Volver al Home</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        },
        mounted() {
        },
        props: [],
        methods: {},
    }
</script>

<style scoped>
</style>
