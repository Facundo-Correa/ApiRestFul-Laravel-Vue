export default {
    state: {
        basket: {
            total: 0,
        },
        summary: {},
        summaryLoading: false,
        basketLoading: false,
        puntosUsuario: 0,
    },
    mutations: {
        SET_BASKET: (state, basket) => state.basket = basket,
        SET_BASKET_LOADING: (state, basketLoading) => state.basketLoading = basketLoading,
        SET_SUMMARY: (state, summary) => state.summary = summary,
        SET_SUMMARY_LOADING: (state, summaryLoading) => state.summaryLoading = summaryLoading,
        SET_PUNTOS_USUARIO: (state, puntosUsuario) => state.puntosUsuario = puntosUsuario,
    },
    actions: {
        getBasket({ commit, dispatch }) {
            return new Promise((resolve, reject) => {
                commit('SET_BASKET_LOADING', true)
                axios.get('/api/basket?per_page=1000')
                    .then(res => {
                        if (res.data.data.length)
                            commit('SET_BASKET', res.data);
                        else
                            commit('SET_BASKET', { total: 0 });
                        resolve()
                    })
                    .catch(err => {
                        commit('SET_BASKET', { total: 0 })
                        reject(err)
                    })
                    .finally(() => {
                        commit('SET_BASKET_LOADING', false)
                        dispatch('getPuntos')
                    })
            });
        },
        /**
         * el parametro IDS debe ser un array.
         * el array contiene objetos con id y quantity,
         * la quantity puede ser positiva o negativa.
         * Ejemplo
         * [
         *  { id: 112, quantity: 1, is_combo: true/false, usa_puntos: false },
         *  { id: 113, quantity: -1, is_combo: true/false, usa_puntos: true },
         * ]
         */
        modifyBasket({ commit, dispatch }, ids) {
            return new Promise((resolve, reject) => {
                axios.put('/api/basket', { ids: ids })
                    .then(res => {
                        resolve(res)
                    })
                    .catch(err =>
                        reject(err)
                     )
                    .finally(() => {
                        dispatch('getBasket')
                    })
            });
        },
        clearBasket({ commit }) {
            return new Promise((resolve, reject) => {
                commit('SET_BASKET_LOADING', true)
                axios.delete('/api/basket')
                    .then(res => {
                        resolve(res)
                    })
                    .catch(err => {
                        reject(err)
                    })
                    .finally(() => {
                        commit('SET_BASKET', { total: 0 })
                        commit('SET_BASKET_LOADING', false)
                    })
            });
        },
        getSummary({ commit }) {
            return new Promise((resolve, reject) => {
                commit('SET_SUMMARY_LOADING', true);
                axios.get('/api/basket/summary')
                    .then(res => {
                        commit('SET_SUMMARY', res.data.data);
                        resolve(res.data.data);
                    })
                    .catch(err => {
                        reject(err);
                    })
                    .finally(() => {
                        commit('SET_SUMMARY_LOADING', false);
                    });
            })
        },
        checkoutSummary({ commit, dispatch }, data) {
            return new Promise((resolve, reject) => {
                axios.post('/api/basket/checkout', data)
                    .then(res => {
                        resolve(res);
                    })
                    .catch(err => {
                        reject(err);
                    })
                    .finally(() => {
                        dispatch('getBasket')
                    })
            })
        },
        getPuntos({ commit }) {
            return new Promise((resolve, reject) => {
                axios.get('/api/users/puntos')
                    .then(res => {
                        commit('SET_PUNTOS_USUARIO', res.data.data);
                        resolve(res);
                    })
                    .catch(err => {
                        commit('SET_PUNTOS_USUARIO', 0);
                        reject(err);
                    })
            })
        }
    },
    getters: {
        userBasket(state) {
            return state.basket;
        },
        basketProductos(state) {
            if (state.basket.data)
                return state.basket.data.filter(x => !x.codigo || x.codigo === null)
            else
                return []
        },
        basketCombos(state) {
            if (state.basket.data)
                return state.basket.data.filter(x => {
                    return typeof x.codigo !== 'undefined' && x.codigo !== null
                })
            else
                return []
        },
        summary(state) {
            if (state.summary.rows) {
                state.summary.rows.map(x => {
                    x.key = (new Date()).getTime() * Math.random()
                });
            }
            return state.summary;
        },
        summaryLoading(state) {
            return state.summaryLoading;
        },
        
        puntosUsuario(state) {
            return state.puntosUsuario;
        }
    },
}
