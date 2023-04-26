export default {
    data() {
        return {
            screen:screen.width,
        }
    },
    mounted() {
        window.addEventListener('resize',this.onResize);
    },
    computed:{
        isMobile() {
            return this.screen <= 768;
        },
        isTablet() {
            return this.screen <= 991;
        },
    },
    methods: {
        onResize() {
            this.screen = screen.width;
            this.$forceUpdate();
        }
    }
}
