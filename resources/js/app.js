/**
 * Importo dependencias
 */
import Vue from 'vue';
require('./bootstrap')
import VueNoty from 'vuejs-noty' // https://github.com/renoguyon/vuejs-noty
import 'vuejs-noty/dist/vuejs-noty.css';
import errorHandler from "./mixins/errorHandler";
import store from './store/store'
import router from './router'
import './plugins/paginable';
import './plugins/smoothScrolling'
import 'vue-imageuploader';
import 'vue-modal';
import 'vue-modal/dist/vue-modal.css';
import VueModal from '@kouts/vue-modal';
import '@kouts/vue-modal/dist/vue-modal.css';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import $ from 'jquery';
window.$ = window.jQuery = $;
import vueDropd from './components/vueDropd';
import VueCookies from 'vue-cookies';
import DataTable from 'laravel-vue-datatable';
import IdleVue from "idle-vue";

const eventsHub = new Vue();

Vue.use(IdleVue, {
    eventEmitter: eventsHub,
    store,
    idleTime: 360000, // 3 seconds
    startAtIdle: false
});
/**
 * Implemento plugins
 */
Vue.component('v-select', vSelect);
Vue.component('vue-dropd', vueDropd);
Vue.component('Modal', VueModal);
Vue.use(DataTable);
Vue.use(VueCookies);


Vue.use(VueNoty, {
    timeout: 4000,
    theme:'metroui',
    progressBar: true,
    layout: 'topRight'
});

//WhatsApp variable
Vue.prototype.$V_WHATSAPP = '11 3060 7993';

//Telefono variable
Vue.prototype.$V_TELEFONO = '(+54 011) 4 545 7993';

//Fax variable
Vue.prototype.$V_FAX = '(+54 011) 4 544 2925';


/** Mixin General */
Vue.mixin(errorHandler);

/**
 * Registro componentes en este directorio y subdirectorios automaticamente
 */
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));




/**
 * Inicio Aplicacion VUE js
 */
const app = new Vue({
    router,
    store
}).$mount('#app');
