<template>
  <a :class="classes" @click="click(data)"  :href="'/api/descargar/' + data.ID">
    {{name}}
  </a>
</template>

<script>

export default {
  props: {
    data: {},
    name: {},
    click: {
      type: Function,
      default: () => {}
    },
    classes: {
      type: Object,
      default: () => ({
        'btn': true,
        'btn-danger': true,
        'btn-sm': true,
      }),
    },
  },

  mounted() {
    
  },
}
</script>

<style scoped>
.btn-cls {
  color:white !important;
}
</style>