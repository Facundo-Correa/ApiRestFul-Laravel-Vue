export default {
    state: {
        wishlist: {
            total: 0,
        },
        wishlistLoading: false,
    },
    mutations: {
        SET_WISHLIST: (state, items) => state.wishlist = items,
        SET_WISHLIST_LOADING: (state, status) => state.wishlistLoading = status,
    },
    actions: {
        getWishlist({ commit }) {
            return new Promise((resolve, reject) => {
                commit('SET_WISHLIST_LOADING', true);

                axios.get('/api/wishlist?per_page=100')
                    .then(res => {
                        if (res.data.data.length)
                            commit('SET_WISHLIST', res.data);
                        else
                            commit('SET_WISHLIST', { total: 0 });

                        resolve();
                    })
                    .catch(err => {
                        commit('SET_WISHLIST', { total: 0 });
                        reject(err);
                    })
                    .finally(() => commit('SET_WISHLIST_LOADING', false))
            })
        },
        addToWishlist({ dispatch }, { id, is_combo,cantidad}) {
            return new Promise((resolve, reject) => {
                axios.post('/api/wishlist', { id: id, is_combo: is_combo, cantidad : cantidad})
                    .then(res => {
                        resolve(res.data.data);
                        dispatch('getWishlist');
                    })
                    .catch(err => reject(err))
            })
        },
        removeFromWishlist({ dispatch }, { id, is_combo }) {
            //console.log(id, is_combo);
            return new Promise((resolve, reject) => {
                axios.post('/api/wishlist', { id: id, is_combo: is_combo, _method: 'DELETE' })
                    .then(res => {
                        resolve(res.data.data);
                        dispatch('getWishlist');
                    })
                    .catch(err => reject(err))
            })
        },
    },
    getters: {
        wishlist(state) {
            return state.wishlist;
        },
        wishlistLoading(state) {
            return state.wishlistLoading;
        }
    },
}
