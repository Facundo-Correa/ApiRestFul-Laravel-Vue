<template>
  <div class="container" id="index">
    <h3>Tratamiento de Im&aacute;genes</h3>
  <br>
   <div id='my_alert'></div>
   <div class='row'>
     <form id='myForm' role="form">
       <div class="row col-xs-12">
         <div class="form-group col-xs-9">
           <label >Codigo (recuerde en separar con ,(coma) para trabajar con varias
             im&aacute;genes)</label>
           <input type="text" class="form-control" v-model="codigo" autocomplete="yes"
                  placeholder="ingrese el codigo de la imagen">
         </div>
       </div>
       <div class="form-group  col-xs-3 ">
         <div class="row col-xs-12">
           <button type="button" class="btn btn-info" v-on:click="search()"> Buscar</button>
         </div>
       </div>
     </form>
   </div>
   <div id='resultado'>
     <h4>Resultado de Busqueda</h4>

 <!-- Projects Row -->
        <div class="row">

            <div class="col-md-4 img-portfolio"  v-for="(articulo,key) in imgs"


            >
              <product-images
                  :key="key"
                  :articulo="articulo"
                  @item="addItem"
                  @itemDel="delItem(articulo)"
              ></product-images>
            </div>

        </div>
   </div>
 </div>
</template>
<style>

.asc {
  background: url(/public/images/asc.png) right center no-repeat;
}

.desc {
  background: url(/public/images/desc.png) right center no-repeat;
}

.row {
  margin-left: 10px;
}

.results .btn {
  margin-right: 10px;
}

.results img {
  margin-right: 10px;
}

.results .form-group {
  float: none;
  margin-bottom: -12px;
}

.alert p {
  color: #000;
}
#resultado{
  height: 600px;
  width: 100%;
  overflow: auto;
}
</style>
<script>
export default {
  data(){
     return{
       codigo : null,
       arrImgs:[],
       exist:false,
       new_name:null,
       imgs :[]
     }
  },
  methods: {
    search() {
      this.imgs = [];
      this.arrImgs = this.codigo?this.codigo.split(','):this.codigo;
      let t_path = '/images/productos/thumbs/';
      let path = '/images/productos/';
      let row = '';
      //console.log(this.arrImgs);
      var resultado = $('#resultado');
      this.arrImgs.forEach(function (code) {
        var code = code.trim();
        let file = path + code + ".jpg";
        if (code && this.urlExists(file + "?" + new Date().getTime())) {
          this.imgs.push(
              {
                code: code,
                path: file,
                exist: true
          });
        }
        else {
          this.imgs.push({
            code: code,
            path: file,
            exist: false
          });
        }
      },this);

    },
    urlExists(url) {
      var http = new XMLHttpRequest();
      http.open('HEAD', url, false);
      http.send();
      var exist = http.getResponseHeader('content-length') != null ?true:false;
      return exist;
    },
    addItem(articulo){
      this.imgs.push(articulo[0])
    },
    delItem(item){
      //console.log(item)
       this.imgs.splice(this.imgs.indexOf(item),1);
    }


  }
};


</script>
