<template>
  <button :class="classes"
          data-toggle="modal"
          data-target="#modal_box"
          @click="click(data)" title="Editar">
        <span>
            <i class="fa fa-edit" aria-hidden="true"></i>
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
        'btn-success': true,
        'btn-sm': true,
      }),
    },
  }
}
</script>

<style scoped>

</style>