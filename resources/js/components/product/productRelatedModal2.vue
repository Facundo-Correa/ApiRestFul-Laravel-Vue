<template>
  <vue-modal :size="'md'" @close="$emit('close')">
    <template slot="title"> <h2>UPS!! parece que ho hay más!!</h2><h4>Pero tenemos estos alternativos para ofrecerte</h4> </template>
    <template slot="body">
      <div class="container">

      </div>
    </template>
  </vue-modal>
</template>

<style scoped lang="scss">
.semaforo {
  margin-bottom: 5px;
  span {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    margin: 0 10px;
    display: inline-block;
    vertical-align: middle;
  }
}

.puntos {
  color: green;
  font-weight: 600;
}

.label_sale {
  .label_nuevo {
    background: #1b4b72;
  }

  .label_oferta {
    background: #07ac40;
  }

  .label_combo {
    background: #b70ace;
  }

  .label_promo {
    background: #da4604;
  }
}

.row.small-gutters {
  margin-right: -5px;
  margin-left: -5px;

  [class^="col"] {
    padding-right: 5px !important;
    padding-left: 5px !important;
    margin-top: 10px;
  }

  img {
    cursor: pointer;
  }
}

.whatsapp_product{
  i, a{
    color: #07ac40;
  }
}
</style>
