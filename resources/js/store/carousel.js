export default {
    state:{
        carousels:[],
        loading:false
    },
    mutations:{
        SET_CAROUSELS: (state, carousels) => state.carousels = carousels,
        SET_LOADING: (state, status) => state.loading = status,
    },
    actions:{
        getCarousels({commit}, zona=null) {
            return new Promise((resolve, reject) => {
                commit('SET_LOADING',true);

                let url = "/api/carousel/";

                axios.get(url)
                    .then(res=>{
                        commit('SET_CAROUSELS',res.data.data);
                        commit('SET_LOADING',false);
                        resolve();
                    })
                    .catch(err=>{
                        commit('SET_LOADING',false);
                        reject(err);
                    });
            })
        }
    },
    getters:{
        carousels(state){
            return state.carousels;
        },
        carouselsLoading(state){
            return state.loading;
        },
    },
}
