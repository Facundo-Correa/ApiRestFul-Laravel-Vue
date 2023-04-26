<template>
  <button :class="classes" @click="edit(data)" title="Editar">
        <span>
            <i class="fa fa-angellist" aria-hidden="true"></i>
        </span>
    &nbsp;
    Editar
  </button>

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
        'btn-success': true,
        'btn-sm': true,
      }),
    },
  }
}
</script>

<style scoped>

</style>