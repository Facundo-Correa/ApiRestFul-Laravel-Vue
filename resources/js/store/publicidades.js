export default {
    state:{
        publicidades: [],
    },
    mutations:{
        SET_PUBLICIDADES: (state, publis) => state.publicidades = publis,
    },
    actions:{
        getPublicidades({commit}) {
            return new Promise((resolve, reject) => {
                axios.get('/api/publicidades')
                    .then(res=>{
                        commit('SET_PUBLICIDADES',res.data.data);
                        resolve();
                    })
                    .catch(err=>{
                        reject(err);
                    });
            })
        },
    },
    getters:{
        publicidadesPar(state) {
            return state.publicidades.filter(x => x.seccion_id === 1);
        },
        publicidadesImpar(state) {
            return state.publicidades.filter(x => x.seccion_id === 2);
        },
    },
}
