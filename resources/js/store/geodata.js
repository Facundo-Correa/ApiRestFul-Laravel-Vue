export default {
    state:{
        paises:[],
        provincias:[],
        localidades:[],
        geodata:[],
        loading:false
    },
    mutations:{
        SET_PAISES: (state, paises) => state.paises = paises,
        SET_PROVINCIAS: (state, provincias) => state.provincias = provincias,
        SET_LOCALIDADES: (state, localidades) => state.localidades = localidades
    },
    actions:{

        getPais({commit},parent_id) {
            return new Promise((resolve, reject) => {

                let url = "/api/geodata/"+parent_id;

                axios.get(url)
                    .then(res=>{
                        commit('SET_PAISES',res.data.data);
                        resolve();
                    })
                    .catch(err=>{
                        commit('SET_PAISES',null);
                        reject(err);
                    });
            })
        },
        getProvincias({commit},parent_id) {
            return new Promise((resolve, reject) => {

                let url = "/api/geodata/"+parent_id;

                axios.get(url)
                    .then(res=>{
                        commit('SET_PROVINCIAS',res.data.data);
                        resolve();
                    })
                    .catch(err=>{
                        commit('SET_PROVINCIAS',null);
                        reject(err);
                    });
            })
        },
        getLocalidades({commit},parent_id) {
            return new Promise((resolve, reject) => {

                let url = "/api/geodata/"+parent_id;

                axios.get(url)
                    .then(res=>{
                        commit('SET_LOCALIDADES',res.data.data);
                        resolve();
                    })
                    .catch(err=>{
                        commit('SET_LOCALIDADES',null);
                        reject(err);
                    });
            })
        }

    },
    getters:{
        paises(state){
            return state.paises;
        },
       provincias(state){
            return state.provincias;
        },
       localidades(state){
            return state.localidades;
        }

    },
}
