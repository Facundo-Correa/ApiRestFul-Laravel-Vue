<template>
  <vue-modal @close="close" ref="modal" size="lg">
    <template slot="title">
      <h3>Cuenta Corriente</h3>
    </template>
    <template slot="body">
      <iframe :src="item" frameborder="0" id="cuentaCorriente"
              title="Consultar Cuenta Corriente"
              width="100%"
              height="500"
              style="visibility: visible">
      </iframe>
    </template>
    <template slot="footer">

    </template>
  </vue-modal>
</template>

<script>
    import { mapActions, mapGetters } from "vuex";

    export default {
        data() {
            return {
                imgUrl: "/images/productos/thumbs/1_thumb.png"
            };
        },
        computed:{
            ...mapGetters([
                'isLoggedIn',
            ]),
        },
        props: ["item"],
        methods: {
            ...mapActions(["addToWishlist", "modifyBasket"]),
            close() {
                this.$emit("close");
            },
            toWishlist(id) {
                this.addToWishlist({ id: id, is_combo: true }).then(res =>
                    this.$noty.success(res)
                );
            },
            toBasket(id) {
                this.modifyBasket([
                    {
                        id: id,
                        quantity: 1,
                        is_combo: true,
                        usa_puntos: false
                    }
                ])
                    .then(res => this.$noty.success(res.data.data))
                    .catch(err => console.log(err));
            }
        }
    };
</script>

<style scoped lang="scss">
.promoImg {
  height: 150px;
  width: auto;
  margin: auto;
  display: block;
  margin-bottom: 15px;
}

a:hover{
  color: #4595c2;
}

.btn-ingresar{
  background-color: #4595c2;
  margin-top: 10px;
  color: white;
  font-size: 13px;
  font-weight: 500;
  width: 40%;
}

.price {
  font-weight: bold;
  color: #4595c2;
  font-size: 1.5em;
}
</style>