<template>
  <button class="btn btn-primary"
          data-toggle="modal"
          data-target="#modal_box"
          @click="accion.event"
          title="accion.label">
        <span>
            <i class="fa fa-trash" aria-hidden="true"></i>
        </span>
    &nbsp;
    {{ accion.label}}
  </button>
</template>

<script>

export default {
  props:
    ['accion'],

}
</script>

<style scoped>

</style>