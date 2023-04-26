import Vue from 'vue';

import VueRouter from 'vue-router';

import clientes from "./admin/pages/clientes/clientes";
import herramientas from "./admin/pages/herramientas/imagenes";
import ctecnica from "./admin/pages/consultatecnica/ctecnica";
import artrel from "./admin/pages/articulos/artrel";
import admofertas from "./admin/pages/ofertas/ofertas";
import combos from "./admin/pages/combos/combos";
import consultas from "./pages/consultas";
import index from "./pages/index/index";
import login from "./pages/login";
import marcas from "./pages/marcas";
import notFound from "./pages/notFound";
import ofertas from "./pages/ofertas";
import productos from "./pages/productos";
import register from "./pages/register";
import accountrecovery from "./pages/accountrecovery";
import preguntasfrecuentes from "./pages/preguntasfrecuentes";
import devolucionesygarantias from "./pages/devolucionesygarantias";
import tycpage from "./pages/tycpage";
import basketPage from "./pages/basket/basketPage";
import summaryPage from "./pages/summary/summaryPage";
import store from "./store/store";
import comprobantes from "./pages/comprobantes.vue";
import MiPerfil from "./components/modals/miPerfil.vue";
import misPresupuestos from "./components/modals/misPresupuestos.vue";
import MisCompras from "./components/modals/misCompras.vue";
import VistaPreviaPresupuesto from "./components/modals/vistaPreviaPresupuesto.vue";
import presupuesto from "./components/modals/presupuesto.vue";
Vue.use(VueRouter);


const auth = (to, from, next) => {
    if (store.getters.isLoggedIn) {
        next();
        return
    }
    next({ name: 'login' })
};

const guest = (to, from, next) => {
    if (!store.getters.isLoggedIn) {
        next();
        return
    }
    next({ name: 'home' })
};

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: index, name: 'home' },
        { path: '/login', component: login, name: 'login', beforeEnter: guest },
        { path: '/register', component: register, name: 'register', beforeEnter: guest },
        { path: '/accountrecovery', component: accountrecovery, name: 'accountrecovery', beforeEnter: guest },
        { path: '/marcas', component: marcas, name: 'marcas' },
        { path: '/preguntasfrecuentes', component: preguntasfrecuentes, name: 'preguntasfrecuentes' },
        { path: '/devolucionesygarantias', component: devolucionesygarantias, name: 'devolucionesygarantias' },
        { path: '/tycpage', component: tycpage, name: 'tycpage' },
        { path: '/admin/clientes', component: clientes, name: 'clientes', beforeEnter: auth },
        { path: '/admin/herramientas', component: herramientas, name: 'herramientas', beforeEnter: auth },
        { path: '/admin/admofertas', component: admofertas, name: 'admofertas', beforeEnter: auth },
        { path: '/admin/ctecnica', component: ctecnica, name: 'ctecnica', beforeEnter: auth },
        { path: '/admin/artrel', component: artrel, name: 'artrel', beforeEnter: auth },
        { path: '/consultas', component: consultas, name: 'consultas' },
        { path: '/productos/:search', component: productos, name: 'productos', beforeEnter: auth },
        { path: '/ofertas', component: ofertas, name: 'ofertas' },
        { path: '/carrito', component: basketPage, name: 'basket', beforeEnter: auth },
        { path: '/summary', component: summaryPage, name: 'summary', beforeEnter: auth },
        { path: '/admin/comprobantes', component: comprobantes, name: 'comprobantes', beforeEnter: auth },
        { path: '/MiCuentaPerfil', component: MiPerfil, name:'MiCuentaPerfil', beforeEnter:auth },
        { path: '/MiCuentaCompras', component: MisCompras, name:'MiCuentaCompras', beforeEnter:auth },
        { path: '/MisPresupuestos', component: misPresupuestos, name:'MiCuentaPresupuestos', beforeEnter:auth },
        { path: '/vista-previa-presupuesto', component: VistaPreviaPresupuesto, name:'VistaPreviaPresupuesto', beforeEnter:auth},
        { path: '/presupuesto', component: presupuesto, name: 'Presupuesto', beforeEnter:auth},
        { path: '*', component: notFound, name: 'notFound' }
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 }
    }

});

/**
 * Agregamos los headers necesarios para todas las peticiones AJAX
 */
router.beforeEach((to, from, next) => {

    let token = store.getters.getToken;

    if (token) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    } else {
        axios.defaults.headers.common['Authorization'] = undefined;
    }
    next();
});


export default router;
