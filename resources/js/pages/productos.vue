<template>

  <!--Revisar sort-dir-->

  <div id="index">
    <div class="container-fluid p-0">
      <filter-bar @onSearch="onSearch" />

      <!--shop  area start-->
      <div class="shop_area shop_reverse mt-60 mb-60">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <!--sidebar widget start-->
              <aside class="sidebar_widget">
                <div class="widget_inner">
                  <div class="widget_list widget_filter">
                    <div class="row">
                      <div class="col-sm-12">
                        <h2>Filtrar por precio</h2> <!-- || Funciona || -->
                        <input
                            type="number"
                            placeholder="Precio mínimo"
                            v-model="params.filters.custom.price_from"
                            class="form-control no-arrows mb-3"
                        />
                        <input 
                            type="number"
                            placeholder="Precio máximo"
                            v-model="params.filters.custom.price_to"
                            class="form-control no-arrows"
                        /> <!-- || Funciona || -->
                      </div>
                    </div>
                    <br>
                    <div class="row"  v-if="showPartes">
                      <div class="col-md-12" >
                        <H2>Filtrar Por Parte</H2>
                        <v-select
                            class="mb-3"
                            v-model="fpartes"
                            :options="partes"
                            label="parte"
                            track-by="id"
                            placeholder="Parte"
                        >
                        <span slot="no-options" @click="$refs.select.open = false">
                            No hay Partes
                        </span>
                        </v-select>
                      </div>
                    </div>
                    <div class="row" v-if="showMM">
                      <div class="col-md-12">
                        <span v-if="showMarca">
                        <H2>Filtrar Por Marca</H2>
                        <v-select
                            class="mb-3"
                            v-model="fmarcas"
                            :options="marcas"
                            @input="getModelo"
                            label="marca"
                            track-by="id"
                            placeholder="Marca"
                        >
                        <span slot="no-options" @click="$refs.select.open = false">
                            No hay Marcas
                        </span>
                        </v-select>
                        </span>
                        <span v-if="showModelo">
                              <H2>Filtrar Por Modelo</H2>
                              <v-select
                                  class="mb-3"
                                  v-model="fmodelos"
                                  :options="modelos"
                                  label="modelo"
                                  track-by="id"
                                  placeholder="Modelo"
                              >
                              <span slot="no-options" @click="$refs.select.open = false">
                                  No hay Partes
                              </span>
                              </v-select>
                          </span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <h2>Filtrar Por Origen</h2>
                        <v-select
                            class="mb-3"
                            v-model="forigen"
                            :options="origen"
                            label="origen"
                            track-by="id"
                            placeholder="Origen"
                        >
                        <span slot="no-options" @click="$refs.select.open = false">
                            No hay Partes
                        </span>
                        </v-select>


                      </div>


                    </div>
                    <button class="btn btn-primary mt-3" @click="filtrarProductos">Filtrar</button>
                    <button class="btn btn-secondary mt-3" @click="resetFilters">Limpiar</button>
                  </div>
                  <div class="widget_list" v-if="combos.length">
                    <h2>Combos</h2>
                    <div class="recent_product_container">
                      <product-combo v-for="combo in combos" :key="combo.id" :combo="combo" />
                    </div>
                  </div>
                </div>
              </aside>
              <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
              <div class="shop_toolbar_wrapper">
                <div class="niceselect_option">
                  <form class="select_option  w-100 pull-left" action="#">
                    <select
                      class="form-control"
                      v-model="sortBy"
                      @change="filtrarProductos"
                    >
                      <option selected="selected" value="precio_actual_desc">Ordenar por Mayor Precio</option>
                      <option value="precio_actual_asc">Ordenar por Menor Precio</option>
                      <option value="vigencia_desde_desc">Ordenar por fecha (Mas actuales)</option>
                      <option value="vigencia_desde_asc">Ordenar por fecha (Mas antiguos)</option>
                      <option value="id_asc">Ordenar por Codigo (Ascendente)</option>
                      <option value="id_desc">Ordenar por Codigo (Descendente)</option>
                      <option value="nombre_asc">Ordenar por Alfabeto (Ascendente)</option>
                      <option value="nombre_desc">Ordenar por Alfabeto (Descendente)</option>

                    </select>
                  </form>
                </div>
                <button class="btn btn-primary mt-1 pull-right"><a href="https://mlrepuestos.com.ar/storage/ListadoCompleto.xlsx" target="_blank">Descargar Lista Completa</a></button>

                <div class="page_amount" v-if="!productosLoading">
                  <p>{{productos.total}} Resultados</p>
                </div>
              </div>
              <!--shop toolbar end-->
              <div
                  id="shopMain"
                  class="row shop_wrapper no-gutters"
                  v-if="productos.data &&
              productos.data.length"
              >
                <!-- PRODUCTOS Y PUBLIS -->
                <template v-for="chunk in chunks">
                  <product-card
                      v-for="producto of chunk.productos"
                      :producto="producto"
                      :key="producto.id"
                      :classChange = "classChange"
                      @close="close"
                      @openRelatedModal="relatedProducts"
                  />

                  <!-- PUBLICIDAD -->
                  <div class="col-12" v-if="chunk.publicidad" :key="chunk.key">
                    <a :href="chunk.publicidad.descripcion">
                      <img :src="chunk.publicidad.imagen" class="img-fluid" />
                    </a>
                  </div>
                </template>
              </div>

              <div class="row shop_wrapper" v-if="productosLoading">
                <div class="col">
                  <loader class="mt-5" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--shop  area end-->

    </div>

    <productRelatedModal v-if="showModalRelated" :key="keyprod" :productos="related" :classChange="classChange" @close="close"></productRelatedModal>

  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      idr:null,
      classChange:false,
      keyprod:Math.random().toString(36).substring(7),
      showModalRelated:false,
      constecnica:false,
      showPartes:true,
      showMM:true,
      showMarca:true,
      showModelo:true,
      fpartes:null,
      fTpartes:null,
      fmarcas:null,
      fmodelos:null,
      forigen:null,
      params: {
        per_page: 16,
        page: 1,
        sortBy: "vigencia_desde",
        sortDir: "desc",
        filters: {
          custom: {
            price_from: null,
            price_to: null,
            ofertas: null,
            partes_id: null
          }
        }
      },
      sortBy: '',
      sortDir: ''
    };
  },
  mounted() {

    if (!this.partes.length) {
      this.getPartes();
    }
    if (!this.forigen) {
      this.getOrigen();
    }
    if(!this.constecnica){

      this.getTpartes();
    }
    // Guardamos los parametros de busqueda en una variable
    if (this.$route.params.search !== "nuevos")
    {
      // 
      if(this.$route.params.search != undefined){
        this.params.filters.custom.id = this.$route.params.search.split("_")[0];
      }
    }
    else this.params.filters.custom.is_new = true;

    window.onscroll = this.addProducts;

    // Obtengo los productos usando los parametros de busqueda
    this.getProductos(this.params);

    // Obtengo los combos a mostrar primero
    this.getCombos(4);

    // Obtengo las publicidades que se mostraran en la pagina
    this.getPublicidades();
  },
  computed: {

    ...mapGetters([
      "tpartes",
      "partes",
      "marcas",
      "modelos",
      "origen",
      "productos",
      "productosLoading",
      "combos",
      "publicidadesPar",
      "publicidadesImpar",
      "related"
    ]),

    chunks() {
      let chunks = [], // Array de prods + publis
          len = 8, // Cantidad de prods x chunk
          i = 0, // separador
          x = 0, // contador
          n = this.productos.data.length; // total de productos

      while (i < n) {
        chunks.push({
          productos: this.productos.data.slice(i, (i += len)),
          publicidad: this.getPublicidadRandom(x),
          key: Math.random * Date.now()
        });
        x++;
      }

      return chunks;
    }
  },
  methods: {
    ...mapActions(["getRelated","getTpartes","getPartes","getMarcas","getModelos","getOrigen","getProductos", "getCombos", "getPublicidades"]),

    relatedProducts(data){
      //console.log(this.related.length);

      this.getRelated(data).then(()=>{
        //console.log('entre aca');
        if(this.related && this.related.length >0 ) {
          this.showModalRelated = true;
          this.classChange = true;
        }
      }) ;
      //console.log(this.related.length)
      if(this.related && this.related.length >0 ) {
        this.showModalRelated = true;
        this.classChange = true;
      }
      this.keyprod = Math.random().toString(36).substring(7)
    },

    getModelo(marca) {
      //console.log(marca);
      if (!marca) {
        this.getModelos(null);
        this.filters.custom.modelo_id = null;
      } else {
        this.getModelos(marca.id);
      }
    },

    onSearch(e) {
      this.constecnica= e.constecnica?true:false;
      this.showPartes = e.filters.marca_id?true:false;
      this.showMM = e.filters.parte_id?true:false;
      if(!e.filters.parte_id && e.filters.marca_id && !e.filters.modelo_id)
      {
        this.showMarca = false;

        this.showModelo = true;
        this.showMM= true;
      } else {
        this.showModelo = false;
        this.showMM= false;
      }
      this.params.page = 1;
      this.params.push = false;
      this.params.filters.custom = e.filters;
      this.filtrarProductos();
    },
    filtrarProductos() {
      
      this.params.page = 1;
      this.params.filters.custom.partes = this.fpartes ? this.fpartes.id : null;
      this.params.filters.custom.marcas = this.fmarcas ? this.fmarcas.id : null
      this.params.filters.custom.modelos =this.fmodelos ? this.fmodelos.id : null
      this.params.filters.custom.origen = this.forigen ? this.forigen.id : null
      this.params.filters.custom.tpartes = this.fTpartes ? this.fTpartes.id : null
      this.params.push = false;

      //console.log("PARAMETROS: ", this.params);

      if(this.sortBy == 'precio_actual_desc'){
        this.params.sortBy = 'precio_actual';
        this.params.sortDir = 'desc';

      }
      else if(this.sortBy == 'precio_actual_asc'){
        this.params.sortBy = 'precio_actual';
        this.params.sortDir = 'asc';
      }

      else if(this.sortBy == 'vigencia_desde_desc'){
        this.params.sortBy = 'vigencia_desde';
        this.params.sortDir = 'desc';
      }
      else if(this.sortBy == 'vigencia_desde_asc'){
        this.params.sortBy = 'vigencia_desde';
        this.params.sortDir = 'asc';
      }

      else if(this.sortBy == 'id_asc'){
        this.params.sortBy = 'id';
        this.params.sortDir = 'asc';
      }
      else if(this.sortBy == 'id_desc'){
        this.params.sortBy = 'id';
        this.params.sortDir = 'desc';
      }
      
      else if(this.sortBy == 'nombre_asc'){
        this.params.sortBy = 'nombre';
        this.params.sortDir = 'asc';
      }
      else if(this.sortBy == 'nombre_desc'){
        this.params.sortBy = 'nombre';
        this.params.sortDir = 'desc';
      }


      this.getProductos(this.params).then(() => {
        done: () => {

          this.params.filters.custom.partes =  null
        };
      });
    },
    resetFilters(){
      this.fpartes = null;
      this.fmarcas = null;
      this.fmodelos = null;
      this.forigen = null;
    },
    addProducts() {
      let mainShop = document.querySelector("#shopMain");
      let windowPosition = document.documentElement.scrollTop;

      if (
          !this.productosLoading &&
          this.productos.last_page > this.productos.current_page
      ) {
        if (mainShop && mainShop.scrollHeight - 200 <= windowPosition) {
          this.params.page++;
          this.params.push = true;
          this.getProductos(this.params);
        }
      }
    },
    getPublicidadRandom(contador) {
      if (contador % 2) {
        return this.publicidadesPar[
            Math.floor(Math.random() * this.publicidadesPar.length)
            ];
      }
      return this.publicidadesImpar[
          Math.floor(Math.random() * this.publicidadesImpar.length)
          ];
    },
    close(){
      //console.log('salgo por aca');
      this.showModalRelated=false;
      this.classChange=false;
    }
  }
};
</script>

<style scoped>
.select_option {
  width: 37%;
  padding-right: 5px;
}
</style>
