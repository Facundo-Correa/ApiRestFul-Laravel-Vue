<template>
  <vue-modal @close="close" ref="modal" size="md">
    <template slot="title">
      <h3>{{item.nombre}}</h3>
    </template>
    <template slot="body">
      <img class="promoImg" :src="item.image || imgUrl" />
    </template>
    <template slot="footer">
      <div class="text-center w-100" v-if="isLoggedIn">
        <p>{{item.descripcion}}</p>
        <p class="price">${{item.precio_total.toFixed(2)}}</p>
        <button class="btn btn-sm" @click="toBasket(item.id)" style="background-color: #4595c2; color: white">
          AÑADIR AL CARRITO
        </button>
        <p class="mt-3"><a @click="toWishlist(item.id)"><i class="fa fa-heart-o" aria-hidden="true"></i> Añadir a Favoritos</a></p>
      </div>
      <div  class="text-center w-100" v-else>
        <router-link tag="button" class="btn btn-md btn-ingresar" to="/login">INGRESAR</router-link>
      </div>
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