<template>
  <!--header bottom satrt-->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-4">
              <v-select
                class="mb-3"
                v-model="form.parte"
                :options="partes"
                label="parte"
                track-by="id"
                placeholder="Parte"
                id="parte"
              >
                <span slot="no-options" @click="$refs.select.open = false">
                    No hay Partes
                </span>
              </v-select>
            </div>
            <div class="col-md-4">
              <v-select
                class="mb-3"
                :options="marcas"
                v-model="form.marca"
                @input="getModelo"
                label="marca"
                placeholder="Marcas"
              >
                <span slot="no-options" @click="$refs.select.open = false">
                    No hay Marcas
                </span>
              </v-select>
            </div>
            <div class="col-md-4">
              <v-select
                class="mb-3"
                :options="modelos"
                v-model="form.modelo"
                label="modelo"
                track-by="id"
                placeholder="Modelos"
              >
                <span slot="no-options" @click="$refs.select.open = false">
                    Elija una marca primero
                </span>
              </v-select>
            </div>
            <div class="col-md-6">
              <input type="text"
                v-model="form.search"
                     @keyup.enter="onBusqueda"
                label="descripcion"
                placeholder="Ingrese nombre o descripción"
                     class="codsInput mb-3 mb-md-0"
              />
            </div>
            <div class="col-md-6">
              <input
                type="text"
                v-model="form.searchCods"
                @keyup.enter="onBusqueda"
                placeholder="Ingresar código ML"
                class="codsInput mb-3 mb-md-0"
              />
            </div>
            <div class="col-md-12 mt-1 place">
              <p>Presione el botón VOZ y diga parte, o marca, o modelo, o código, o solo diga buscar. Junto con el artículo que desea buscar.<br>
              Por ejemplo diga "Parte acelerador". | O sino diga "Buscar acelerador"</p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary btn-sm btn-block h-45" id="buscar" @click="onBusqueda">Buscar</button>
          <button class="btn btn-info btn-sm btn-block h-45" @click="getCtecnica">Consulta Tecnica</button>
          <!-- agregar incono microfono -->
          <button class="btn btn-danger btn-sm btn-block h-45" @click="javis">
            <i class="fa fa-microphone" aria-hidden="true"></i>
             Voz
          </button>
          <p class="row-md-4 place mt-1" v-if="resultado != null">Buscó: {{resultado}}</p>
        </div>
        <div class="col-md-1">
          <button class="btn btn-dark btn-sm h-30" style="height: 100%" @click="resetForm">Limpiar <br/> Formulario</button>
        </div>
      </div>
    </div>
    <productConsultaTecnica v-if="constecnica"  @close="constecnica=false" :datos="form"></productConsultaTecnica>
  </div>
  <!--header bottom end-->

</template>

<script>
import { mapActions, mapGetters } from "vuex";


export default {

  data() {
    return {
      constecnica: false,
      productos: [],
      resultado: null,
      form: {
        parte: null,
        marca: null,
        modelo: null,
        search: null,
        searchCods: null
      },
      fun: function(){
        let fi = this.partes.find(e => e.parte == 'ACOPLE A CAJA DE FILTRO DE AIRE'); //cambiar string por la busqueda de voz
        console.log(fi,' Soy fi');
        this.form.parte = fi;
        this.onBusqueda();
      }
    };
  },
  mounted() {
    if (!this.partes.length) {
      this.getPartes();
    }

    if (!this.marcas.length) {
      this.getMarcas();
    }
  },
  computed: {
    ...mapGetters(["partes", "marcas", "modelos"]),
    busquedaValida() {
      return (
        this.form.parte ||
        this.form.marca ||
        this.form.modelo ||
        this.form.searchCods ||
        this.form.search
      );
    },
    busquedaValidaT() {
      return (
          this.form.marca ||
          this.form.modelo
      );
    }
  },
  methods: {
    ...mapActions(["getPartes", "getMarcas", "getModelos"]),
    getModelo(marca) {
      if (!marca) {
        this.getModelos(null);
        this.form.modelo = null;
      } else {
        this.getModelos(marca.id);
      }
    },
    getCtecnica() {

      if(!this.form.marca|| !this.form.modelo) {
        this.constecnica = false;
        this.$noty.error('Antes de  debe elegir una marca y modelo');
        this.resetForm();
        return false;

      }
      //console.log(this.form)
      this.constecnica = true;
    },
    isMobile() {
     if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
       return true
     } else {
       return false
     }
   },
    ajaxFindProduct(query) {
      if (query && query.length >= 3) {


        let url = "/api/producto/busqueda?search=";

        axios
          .get(url)
          .then(res => {
            this.productos = res.data.data;
            this.form.search = query;
          })
          .catch(err => this.showError(err))
          ;
      }
    },
    onBusqueda() {
      if (!this.busquedaValida)
        this.$noty.error("Debe seleccionar algun criterio de busqueda.");
      else
        this.$emit("onSearch", {
          filters: {
            parte_id: this.form.parte ? this.form.parte.id : null,
            marca_id: this.form.marca ? this.form.marca.id : null,
            modelo_id: this.form.modelo ? this.form.modelo.id : null,
            id:
              this.form.search && typeof this.form.search === "object"
                ? this.form.search.id
                : null,
            search:
              typeof this.form.search === "string" && this.form.search !='' ? this.form.search : null,
            searchCods: this.form.searchCods ? this.form.searchCods : null
          },
          done: () => {
            this.form = {
              parte: null,
              marca: null,
              modelo: null,
              search: null,
              searchCods: null,
            }
            this.filters=null;
            this.resultado=null;
          }
        });
    },
    resetForm(){
        this.form.parte= null;
        this.form.marca= null;
        this.form.modelo= null;
        this.form.search= null;
        this.form.searchCods= null;
        this.filters = null
    },
    onBusquedatecnica() {
      if (!this.busquedaValidaT)
        this.$noty.error("Debe seleccionar Marca y Modelo para realizar la busqueda tecnica.");
      else
        this.$emit("onSearch", {
          constecnica:true,
          filters: {
            consulta_tecnica: true,
            marca_id: this.form.marca ? this.form.marca.id : null,
            modelo_id: this.form.modelo ? this.form.modelo.id : null,
            search:
                typeof this.form.search === "string" ? this.form.search : null,
            searchCods: this.form.searchCods ? this.form.searchCods : null
          },
          done: () => {

            this.form = {
              parte: null,
              marca: null,
              modelo: null,
              search: null,
              searchCods: null,

            }
            this.filters=null
          }
        });
    },
    busc(e){
      if(e.parte){
        this.form.parte = e;
        this.resultado = e.parte;
        this.onBusqueda();
      }
      if(e.marca){
        this.form.marca = e;
        this.resultado = e.marca;
        this.onBusqueda();
      }
      if(e.modelo){
        this.form.modelo = e;
        this.resultado = e.modelo;
        this.onBusqueda();
      }
      if(e.codig){
        this.form.searchCods = e.codig;
        this.resultado = e.codig;
        this.onBusqueda();
      }
      if(e.sear){
        this.form.search = e.sear;
        this.resultado = e.sear;
        this.onBusqueda();
      }
    },
    javis(){
      console.log(this.form.modelo);
      let rec; //variable post declarable en el else
        if(!("webkitSpeechRecognition" in window)){
            alert("Usa Google Chrome para el reconocimiento de voz");
        }else{
            rec = new webkitSpeechRecognition();
            rec.lang = "es-AR";
            rec.continuous = false;
            rec.interim = true;
            rec.addEventListener('result', iniciar);
        }
        function iniciar(event){
          
          for(var i = event.resultIndex; i < event.results.length; i++){
            let ing1 = event.results[i][0].transcript;
            let ing = ing1.toLowerCase();
            //----- todo el ingreso en minusculas -----
            
            let part = ing.includes('parte');
            if (part == true){
              let parteStr = ing.substr(6,1000);
              let parteStrUp = parteStr.toUpperCase();
              console.log('Dijo por micrófono:',parteStrUp);
              axios.get('api/buscarparte/'+parteStrUp)
              .then((respuesta) => {
                let even = respuesta.data.data[0];
                rec.onend(even);
                leerTexto(parteStrUp);
              });
            }

            let marc = ing.includes('marca');
            if(marc == true){
              let marcaStr = ing.substr(6,1000);
              let marcaStrUp = marcaStr.toUpperCase();
              console.log('Dijo por micrófono:',marcaStrUp);
              axios.get('api/buscarmarca/'+marcaStrUp)
              .then((respuesta) => {
                let even = respuesta.data.data[0];
                rec.onend(even);
                leerTexto(marcaStrUp);
              });
            }

            let model = ing.includes('modelo');
            if(model == true){
              let modeloStr = ing.substr(7,1000);
              let modeloStrUp = modeloStr.toUpperCase();
              console.log('Dijo por micrófono:',modeloStrUp);
              axios.get('api/buscarmodelo/'+modeloStrUp)
              .then((respuesta) => {
                let even = respuesta.data.data[0];
                rec.onend(even);
                leerTexto(modeloStrUp);
              });
            }

            let cod = ing.includes('código');
            if(cod == true){
              let codigo = ing.substr(7, 1000);
              console.log('Dijo por micrófono:', codigo);
                let even = {
                  codig: codigo
                }
                rec.onend(even);
                leerTexto(codigo);
            }

            let bus = ing.includes('buscar');
            if(bus == true){
              let bu = ing.substr(7,1000);
              console.log('Dijo por micrófono:',bu);
              let even = {
                sear: bu
              }
              rec.onend(even);
              leerTexto(bu);
            }
          }

          function leerTexto (e){
            const speech = new SpeechSynthesisUtterance();
            speech.text = 'buscando ' + e;
            speech.volume = 1;
            speech.rate = 0.7;
            speech.pitch = 2;
            window.speechSynthesis.speak(speech);
          }
        }
      rec.start();
      rec.onend = (even) => {
        this.busc(even);
      }
    }
  }//fin methods
};//fin script export default
</script>


<style lang="scss">
.v-select.no-arrows svg {
  display: none;
}
.codsInput {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  display: -webkit-box;
  display: flex;
  padding: 3px 9px;
  background: none;
  border: 1px solid rgba(60, 60, 60, 0.26);
  border-radius: 4px;
  white-space: normal;
  width: 100%;

  &::placeholder {
    color: black;
  }
}
.place{
  opacity: 50%;
  color: black;
}
</style>
