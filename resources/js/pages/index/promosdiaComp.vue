<template>
  <div v-if="promos.length">
    <!--blog area start-->
    <section class="blog_section mb-70">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section_title">
              <h2>Promociones del Día</h2>
            </div>
          </div>
        </div>

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
              items: 3
            },
            992: {
              items: 4
            },
            1200: {
              items: 5
            }
          }"
          class="blog_carousel blog_column4"
        >
          <div class="col-lg-3" v-for="promo in promos" :key="promo.id">
            <article class="single_blog">
              <figure>
                <div class="blog_thumb">
                  <a @click.prevent="promoSelected = promo">
                    <img :src="promo.imagen || imgUrl" alt />
                  </a>
                </div>
                <figcaption class="blog_content">
                  <h3 class="post_title">
                    <a @click.prevent="promoSelected = promo">
                      <span v-if="promo.nombre.length > 50">{{promo.nombre.substring(0,50)+'...'}}</span>
                      <span v-else>{{promo.nombre}}</span>
                    </a>
                  </h3>
                </figcaption>
              </figure>
            </article>
          </div>
        </carousel>
      </div>
    </section>
    <!--blog area end-->

    <modal-promos :item="promoSelected" v-if="promoSelected" @close="promoSelected = null" />
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import carousel from "vue-owl-carousel";

export default {
  components: { carousel },
  data() {
    return {
      promoSelected: null,
      user: false,
      imgUrl: "/images/productos/thumbs/1_thumb.png"
    };
  },
  computed: {
    ...mapGetters(["promos", "isLoggedIn", "getUser"])
  },
  mounted() {
    if (!this.promos.length) {
      this.getPromos();
    }

    if (this.$store.getters.isLoggedIn) {
      this.user = this.$store.getters.getUser;
      this.logueado = true;
      if (this.$store.getters.getUser.role === "admin") {
        this.isAdmin = true;
      }
    }

    // setTimeout(() => {
    //   this.$nextTick(() => {
    //     /*---featured column3 activation---*/
    //     $(this.$el)
    //       .find(".blog_column4")
    //       .on("changed.owl.carousel initialized.owl.carousel", function(event) {
    //         $(event.target)
    //           .find(".owl-item")
    //           .removeClass("last")
    //           .eq(event.item.index + event.page.size - 1)
    //           .addClass("last");
    //       })
    //       .owlCarousel({
    //         loop: true,
    //         nav: true,
    //         autoplay: false,
    //         autoplayTimeout: 4000,
    //         items: 4,
    //         dots: false,
    //         navText: [
    //           '<i class="ion-ios-arrow-left"></i>',
    //           '<i class="ion-ios-arrow-right"></i>'
    //         ],
    //         responsiveClass: true,
    //         responsive:
    //       });
    //   });
    // }, 2000);
  },
  methods: {
    ...mapActions(["getPromos"])
  }
};
</script>

<style scoped>
</style>
