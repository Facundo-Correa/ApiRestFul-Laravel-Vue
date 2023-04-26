import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth';
import carousel from './carousel'
import productos from './productos'
import wishlist from './wishlist'
import favoritos from './favoritos'
import geodata from './geodata'
import basket from './basket'
import publicidades from './publicidades'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth,
        carousel,
        productos,
        favoritos,
        wishlist,
        geodata,
        basket,
        publicidades,
    }
})
