<template>
    <div class="overlay">
        <div class="modal-idle">
            <div class="modal-title d-flex items-center justify-between p-3">
                <span>La sesión esta por expirar</span>
            </div>
            <div class="p-3">
                <p>Estuviste ausente mas de 30 minutos</p>
                <p>{{ second }} segundos restantes</p>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions } from "vuex";
    export default {
        data() {
            return {
                result: null,
                time: 30000
            }
        },
        created() {
            let timerId = setInterval(() => {
                this.time -= 1000;
                if (!this.$store.state.idleVue.isIdle) clearInterval(timerId);
                if (this.time < 1) {
                    clearInterval(timerId);
                    // Your logout function should be over here
                    //this.logOut();
                  window.location.reload();
                }
            }, 1000);
        },
        mounted() {

        },
        computed: {
            second() {
                return this.time / 1000;
            }
        },
        methods: {
            ...mapActions(["logout"]),
            logOut() {
                this.logout().then(() => {
                    this.$router.push({ name: "login" }, undefined, () => {
                        this.$router.go();
                    });
                });
            },
        },

    }
</script>

<style scoped lang="scss">

    .overlay {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.3);
        z-index: 100;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .modal-idle {
        width: 500px;
        box-shadow: 1px 2px 4px rgba(153, 155, 168, 0.12);
        border-radius: 4px;
        background-color: white;

        p{
            font-size: 16px;
        }
    }
    .modal-title {
        color: #38404f;
        font-weight: 600;
        font-size: 18px;
    }

</style>
