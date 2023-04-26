export default {
    state: {
        favoritos: { total: 0, },
        favoritosLoading: false,
    },
    mutations: {
        SET_FAVORITOS: (state, items) => state.favoritos = items,
        SET_FAVORITOS_LOADING: (state, status) => state.favoritosLoading = status,
    },
    actions: {
        getFavoritos({ commit }) {
            return new Promise((resolve, reject) => {
                commit('SET_FAVORITOS_LOADING', true);

                axios.get('/api/favoritos?per_page=100')
                    .then(res => {
                        if (res.data.data.length)
                            commit('SET_FAVORITOS', res.data);
                        else
                            commit('SET_FAVORITOS', { total: 0 });

                        resolve();
                    })
                    .catch(err => {
                        commit('SET_FAVORITOS', { total: 0 });
                        reject(err);
                    })
                    .finally(() => commit('SET_FAVORITOS_LOADING', false))
            })
        },
        addToFavoritos({ dispatch }, { id, is_combo,cantidad}) {
            return new Promise((resolve, reject) => {
                axios.post('/api/favoritos', { id: id, is_combo: is_combo, cantidad : cantidad})
                    .then(res => {
                        resolve(res.data.data);
                        dispatch('getFavoritos');
                    })
                    .catch(err => reject(err))
            })
        },
        removeFromFavoritos({ dispatch }, { id, is_combo }) {
            //console.log(id, is_combo);
            return new Promise((resolve, reject) => {
                axios.post('/api/favoritos', { id: id, is_combo: is_combo, _method: 'DELETE' })
                    .then(res => {
                        resolve(res.data.data);
                        dispatch('getFavoritos');
                    })
                    .catch(err => reject(err))
            })
        },
    },
    getters: {
        favoritos(state) {
            return state.favoritos;
        },
        favoritosLoading(state) {
            return state.favoritosLoading;
        }
    },
}
