<template>
  <div>
    <div class="form-check form-check-inline">
      <input 
        class="form-check-input"
        type="checkbox"
        value="option1"
        @change="click(data)"
        />
    </div>
  </div>
</template>

<script>

export default {
    mounted() {
    },
  props: {
    data: {},
    name: {},
    click: {
      type: Function,
      default: () => {/*console.log("KJASDLASJD");*/}
    },
  }
}
</script>

<style scoped>

</style>