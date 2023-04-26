<template>
  <div>
    <section class="slider_section slider_section_two mb-70">
      <!-- seccion carrusel de imagenes -->
      <loader class="row" style="height:200px" v-if="carouselsLoading"></loader>

      <carousel
        :autoplay="true"
        :nav="false"
        :autoplayHoverPause="true"
        :dots="false"
        :loop="true"
        :autoplaySpeed="400"
        :center="true"
        :items="1"
        v-if="!carouselsLoading"
      >
        <div
          class="slide"
          v-for="slide in carousels"
          :key="slide.id"
          v-bind:style="[isMobile ? { backgroundImage: 'url(' + slide.image_mobile + ')' } : { backgroundImage: 'url(' + slide.image_desktop + ')' }]"
        >
          <div class="slider_content">
            <h1>{{slide.titulo}}</h1>
            <h2>{{slide.copete}}</h2>
            <p>{{slide.texto}}</p>
            <a class="button" style="margin-top: 45px" :href="slide.link">Comprar ahora</a>
          </div>
        </div>
      </carousel>
    </section>
  </div>
</template>

<script>
import carousel from "vue-owl-carousel";
import { mapActions, mapGetters } from "vuex";
import mobileChecker from "../../mixins/mobileChecker";

export default {
  components: { carousel },
  mixins: [mobileChecker],
  data() {
    return {};
  },
  computed: {
    ...mapGetters(["carousels", "carouselsLoading"])
  },
  mounted() {
    if (!this.carousels.length) {
      this.getCarousels();
    }
  },
  methods: {
    ...mapActions(["getCarousels"])
  }
};
</script>

<style scoped lang="scss">
.slide {
  height: 380px;
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
.slider_content {
  padding-top: 60px;
  padding-left: 60px;

}
</style>
