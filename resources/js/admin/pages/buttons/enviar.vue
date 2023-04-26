<template>
  <div>
    <div style="display: flex; justify-content: center; align-items: center">
      <input v-model="email" type="text" name="destino" id="destino" />
      <!--@click="click(data)"-->
      <button
        :class="classes"
        @click="enviar(data)"
        title="Enviar"
        style="margin-left: 10px"
      >
        Enviar
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: {},
    name: {},
    click: {
      type: Function,
      default: () => {},
    },
    classes: {
      type: Object,
      default: () => ({
        btn: true,
        "btn-danger": true,
        "btn-sm": true,
      }),
    },
  },
  data() {
    return {
      url: "/api/enviar-comprobante/",
      email: "",
    };
  },
  mounted() {},
  methods: {
    enviar(data) {
      let self = this;
      axios
        .post("/api/enviar-comprobante", {
          id: data.ID,
          email: self.email,
        })
        .then(function (response) {
          
        });
    },
  },
};
</script>

<style scoped>

</style>