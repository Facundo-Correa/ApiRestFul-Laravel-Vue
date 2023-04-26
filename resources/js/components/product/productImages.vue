<template>
  <div>
    <span  v-if="articulo.exist" >
                <h3>Project {{articulo.code}}</h3>
                <img class="img-responsive img-hover" :src="articulo.path" alt="">

                <label>Ingrese el nuevo codigo para el articulo a copiar o renombrar</label>
                <input type="text"  v-model="new_name"  :id="'id_articulo_'+articulo.code" class="form-control">
                <button type="button" class="btn pull-left btn-primary btn-sm" @click="manejoImagenes(articulo.code,'rename')">Cambiar Nombre</button>
                <button type="submit" class="btn pull-left btn-sm btn-warning" @click="manejoImagenes(articulo.code,'copiar')">Copiar</button>
                <button type="button" class="btn pull-left btn-sm btn-danger" @click="manejoImagenes(articulo.code,'borrar')">Borrar</button>
              </span>
    <span v-else>
              <h3>
                 No existe el articulo: {{articulo.code}}
              </h3>

              </span>
  </div>
</template>
<script>
export  default {
  data(){
    return {
      new_name:null
    }
  },
  props: ['articulo'],
  methods:{
    manejoImagenes(id,accion){


      if (!this.new_name) {
        return;
      }

      let data = {"id":id,"action":accion,"id_new":this.new_name};
      axios
          .post('/api/admin/herramientas/procesar', data)
          .then(res => {
            var result = res.data.data;
            //console.log(result);
            if(!result.status)
            {
              this.$noty.warning(result.msg)
            } else {
              switch (accion){
                case 'rename':
                  this.articulo.code = this.new_name;
                  this.articulo.path = '/images/productos/'+this.new_name+'.jpg'
                  this.$noty.success(result.msg)
                  break;
                case 'copiar':
                  var data = [{"code":this.new_name,"path":'/images/productos/'+this.new_name+'.jpg',"exist":true}]
                  this.$emit('item',data);
                  this.$noty.success(result.msg);
                case 'borrar':
                  var data = [{"code":id,"path":'/images/productos/'+id+'.jpg',"exist":true}]
                  this.$emit('itemDel',data);
                  this.$noty.success(result.msg);
              }
            }
          })
          .catch(this.showError)


    }
  }
}
</script>
