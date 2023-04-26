export default {
    state: {
        partes: [],
        marcas: [],
        modelos: [],
        origen:[],
        combos: [],
        ofertas: [],
        portada: [],
        promos: [],
        productos: {},
        tpartes:[],
        loading: false,
        related:[],
    },
    mutations: {
        SET_OFERTAS: (state, ofertas) => state.ofertas = ofertas,
        SET_PORTADA: (state, portada) => state.portada = portada,
        SET_PROMOS: (state, promos) => state.promos = promos,
        SET_PARTES: (state, partes) => state.partes = partes,
        SET_TPARTES: (state, tpartes) => state.tpartes = tpartes,
        SET_MARCAS: (state, marcas) => state.marcas = marcas,
        SET_MODELOS: (state, modelos) => state.modelos = modelos,
        SET_ORIGEN: (state, origen) => state.origen = origen,
        SET_PRODUCTOS: (state, productos) => state.productos = productos,
        SET_COMBOS: (state, combos) => state.combos = combos,
        SET_RELATED: (state, related) => state.related = related,
        SET_LOADING_PRODUCTOS: (state, loadingStatus) => state.loading = loadingStatus,
    },
    actions: {
        getPartes({ commit }) {
            return new Promise((resolve, reject) => {

                let url = "/api/partes/";

                axios.get(url)
                    .then(res => {
                        commit('SET_PARTES', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_PARTES', []);
                        reject(err);
                    });
            })
        },
        getTpartes({ commit } , data) {

            return new Promise((resolve, reject) => {

                let url;
                if(!data){
                    url = "/api/tpartes/";
                } else {
                    url="/api/tpartes/"+ data.marca_id +"/"+data.id;
                }

                axios.get(url)
                    .then(res => {
                        commit('SET_TPARTES', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_TPARTES', []);
                        reject(err);
                    });
            })
        },
        getMarcas({ commit }) {
            return new Promise((resolve, reject) => {

                let url = "/api/marcas/";

                axios.get(url)
                    .then(res => {
                        commit('SET_MARCAS', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_MARCAS', []);
                        reject(err);
                    });
            })
        },
        getModelos({ commit }, marca_id) {

            if (!marca_id) {
                commit('SET_MODELOS', []);
                return;
            }

            return new Promise((resolve, reject) => {

                let url = "/api/modelos/" + marca_id;

                axios.get(url)
                    .then(res => {
                        commit('SET_MODELOS', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_MODELOS', []);
                        reject(err);
                    });
            })
        },
        getOrigen({ commit }) {
            return new Promise((resolve, reject) => {

                let url = "/api/origen/";

                axios.get(url)
                    .then(res => {
                        commit('SET_ORIGEN', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_ORIGEN', []);
                        reject(err);
                    });
            })
        },
        getProductos({ commit, getters }, params) {
            return new Promise((resolve, reject) => {
                //console.log(params);
                let url = '/api/producto'.paginableUrl(params);

                if(params.filters.custom.consulta_tecnica)
                    url = '/api/ctecnica'.paginableUrl(params);

                commit('SET_LOADING_PRODUCTOS', true);
                axios.get(url)
                    .then(res => {
                        let newProds = res.data;

                        if (params.push === true) {
                            let lastProds = getters.productos.data;
                            newProds.data = lastProds.concat(newProds.data);
                        }

                        commit('SET_PRODUCTOS', newProds);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_PRODUCTOS', null);
                        reject(err);
                    })
                    .finally(() => {
                        commit('SET_LOADING_PRODUCTOS', false);
                    });
            });
        },
        getCombos({ commit }, limit = null) {
            return new Promise((resolve, reject) => {

                let url = '/api/combos';
                if (limit) url += '?limit=' + limit;

                axios.get(url)
                    .then(res => {
                        let combos = res.data.data.map(x => {
                            x.is_combo = true;
                            return x;
                        });

                        commit('SET_COMBOS', combos);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_COMBOS', []);
                        reject(err);
                    })
            });
        },
        
        getOfertas({ commit }, limit) {
            return new Promise((resolve, reject) => {

                let url = "/api/ofertas";

                if (limit)
                    url += '?limit=' + limit;

                axios.get(url)
                    .then(res => {
                        commit('SET_OFERTAS', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_OFERTAS', null);
                        reject(err);
                    });
            })
        },
        getPortada({ commit }, oferta_id) {
            return new Promise((resolve, reject) => {

                let url = "/api/portada/id=?" + oferta_id;

                axios.get(url)
                    .then(res => {
                        commit('SET_PORTADA', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_PORTADA', null);
                        reject(err);
                    });
            })
        },
        getRelated({ commit},dato) {
            return new Promise((resolve, reject) => {

                let url = '/api/related/?id='+dato.id;

                commit('SET_LOADING_PRODUCTOS', true);
                axios.get(url)
                    .then(res => {

                        commit('SET_RELATED', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_RELATED', null);
                        reject(err);
                    })
                    .finally(() => {
                        commit('SET_LOADING_PRODUCTOS', false);
                    });
            });
        },
        getPromos({ commit }) {
            return new Promise((resolve, reject) => {

                let url = "/api/promos/";

                axios.get(url)
                    .then(res => {
                        commit('SET_PROMOS', res.data.data);
                        resolve();
                    })
                    .catch(err => {
                        commit('SET_PROMOS', null);
                        reject(err);
                    });
            })
        },
    },
    getters: {
        partes(state) {
            return state.partes;
        },
        tpartes(state) {
            return state.tpartes;
        },
        marcas(state) {
            return state.marcas;
        },
        modelos(state) {
            return state.modelos;
        },
        origen(state) {
            return state.origen;
        },
        productos(state) {
            return state.productos;
        },
        combos(state) {
            return state.combos;
        },
        ofertas(state) {
            return state.ofertas;
        },
        portada(state) {
            return state.portada;
        },
        promos(state) {
            return state.promos;
        },
        productosLoading(state) {
            return state.loading;
        },
        related(state) {
            return state.related;
        }

    },
}
