<template>
  <button :class="classes" @click="click(data)" title="Editar">
        <span>
            <i class="fa fa-trash" aria-hidden="true"></i>
        </span>
    &nbsp;
    {{ name }}
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
        'btn-danger': true,
        'btn-sm': true,
      }),
    },
  }
}
</script>

<style scoped>

</style>