<template>
  <div>
    <header-main></header-main>
    <div id="main-wrap">
        <modalIdle v-if="isIdle" />
      <router-view :key="$route.path"></router-view>
    </div>
    <footer-main></footer-main>
  </div>
</template>
<script>
    import { mapGetters } from "vuex";
    export default {
        computed: {
            ...mapGetters(["isLoggedIn"]),
            isIdle() {
                if (this.isLoggedIn){
                    return this.$store.state.idleVue.isIdle;
                }
            }
        }
    };
</script>