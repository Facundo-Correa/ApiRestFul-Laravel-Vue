<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Mi Pedido</h2>
      </div>
    </div>
    <div class="row mt-4 mb-2">
      <div class="col-6">
        <p>
          <b>Empresa:</b>
          {{getUser.persona.empresa}}
          <br />
          <b>CUIT:</b>
          {{getUser.persona.cuit}}
        </p>
      </div>
      <div class="col-6" v-if="summary.rows">
        <p>
          <b>Pedido Nro:</b>
          #{{('00000000'+summary.n_pedido).slice(-8)}}
          <br />
          <b>Fecha:</b>
          {{summary.fecha}}
          <br />
          <b>Cantidad:</b>
          {{summary.rows.reduce((a,b) => a + b.cantidad, 0)}}
          <br />
          <b>Monto:</b>
          $ {{summary.total.toFixed(2)}}
          <br />
        </p>
      </div>
    </div>
    <div class="row mt-4 mb-5">
      <div class="col">
        <ul class="list-group" v-if="!summaryLoading && summary.rows">
          
          <summary-prod v-for="item in summary.rows" :key="item.key" :item="item" />
          <li class="list-group-item list-group-item-primary">
            <div class="row">
              <div class="col-md-7">
                <div class="row justify-content-end">
                  <div class="text-right">
                    <h3>
                      <b>TE AHORRASTE:</b>
                    </h3>
                    <h3>$ {{summary.subtotal_ahorro.toFixed(2)}}</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="row justify-content-end">
                  <div class="col-md-8 text-right">
                    <b>PUNTOS A DESCONTAR:</b>
                  </div>
                  <div class="col-md-4 text-left">{{summary.total_puntos}}</div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-md-8 text-right">
                    <b>SUBTOTAL:</b>
                  </div>
                  <div class="col-md-4 text-left">$ {{summary.subtotal.toFixed(2)}}</div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-md-8 text-right">
                    <b>IVA:</b>
                  </div>
                  <div class="col-md-4 text-left">$ {{summary.iva.toFixed(2)}}</div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-md-8 text-right">
                    <b>TOTAL:</b>
                  </div>
                  <div class="col-md-4 text-left">$ {{summary.total.toFixed(2)}}</div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h4>Elija la forma, fecha y dirección de entrega:</h4>
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="radio" :value="1" id="radio1" v-model="entrega" />
          <label class="form-check-label" for="radio1">Retiro Personalmente</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" :value="2" id="radio2" v-model="entrega" />
          <label class="form-check-label" for="radio2">Envío Comisionista</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" :value="3" id="radio3" v-model="entrega" />
          <label class="form-check-label" for="radio3">Envío por Expreso</label>
        </div>
        <div class="form-check" v-if="summary.rows">
          <input
            class="form-check-input"
            type="radio"
            :value="this.FleteGBA.tipo"
            id="radio4"
            v-model="entrega"
          />
          <label class="form-check-label" for="radio4">
            Flete en CABA - GBA ${{this.FleteGBA.precio}}
            <span
              style="color:green"
              v-if="this.FleteGBA.descuento > 0"
            >({{this.FleteGBA.descuento}}% de descuento)</span>
          </label>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group mt-3">
          <label for="fechaInput">Fecha de Retiro (días hábiles)</label>
          <datetime
            type="datetime"
            input-class="form-control"
            value-zone="local"
            :phrases="{ok: 'Seleccione fecha y hora', cancel: 'Cancelar'}"
            :minute-step="5"
            :min-datetime="minDate"
            :max-datetime="maxDate"
            :week-start="1"
            v-model="date"/>
        </div>
      </div>

      <div class="col-12">
        <div class="form-group mt-1">
          <label>Dirección de entrega/Observaciones:</label>
          <input type="text" class="form-control" v-model="direccion" />
        </div>
      </div>
    </div>
    <div class="row my-5">
      <div class="col">
        <p>
          Recuerde que un representante de ML se contactara con usted para confirmar dichas fechas,
          asi mismo los pedidos tienen un minimo de preparación de 24hs.
          <br />Nota: estos importes son orientativos y referenciales, el importe correcto a abonar será dado por la factura de compra. Gracias!
        </p>
      </div>
    </div>
    <div class="row my-5">
      <div class="col">
        <button class="btn btn-primary btn-block" @click="checkout" :disabled="state.isSending">Enviar Pedido</button>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { Datetime } from "vue-datetime";
import "vue-datetime/dist/vue-datetime.css";
import moment from 'moment';

// Settings para el datetime picker
import { Settings } from "luxon";
Settings.defaultLocale = "es";

export default {
  data() {
    return {
      date: moment().add(1,'days').format(),
      direccion: null,
      entrega: 1,
      minDate: moment().add(1,'days').format(),
      maxDate: moment().add(7,'days').format(),
      state: {
        isSending: false
      },
      FleteGBA: []
    };
  },
  components: {
    Datetime
  },
  mounted() {
    this.getSummary().then(res => {
      if (!res.rows.length) {
        this.$noty.error("Su carrito esta vacio");
        this.$router.push({ name: "home" });
      }
      this.FleteGBA = res.fleteGBA;
      
    });
    //con esto veo en consola que hay dentro de getUser,
    //se ve en consola cuando entras al segundo sumario para comprar.
    // let par = JSON.stringify(this.getUser);
    // console.log(par+' <- getuser')
  },
  computed: {
    ...mapGetters(["summary", "summaryLoading", "getUser"])
  },
  methods: {
    ...mapActions(["getSummary", "checkoutSummary"]),
    formIsValid() {
      let valid = true;
      if (!this.date) {
        valid = false;
        this.$noty.error("Debe seleccionar una fecha y hora aproximada.");
      }
      if (this.entrega > 2 && !this.direccion) {
        valid = false;
        this.$noty.error("Debe especificar una direccion de entrega");
      }

      return valid;
    },
    checkout() {
      if (this.formIsValid()) {
        this.state.isSending = true;
        this.checkoutSummary({
          fecha_entrega: new Date(this.date),
          // dir_entrega: this.entrega > 2 ? this.direccion : null,
          dir_entrega: this.direccion,
          tipo_entrega: this.entrega
        })
          .then(res => {
            this.state.isSending = false;
            this.$router.push({name:'productos',params:{search:'nuevos'}});
            this.$noty.success(res.data.data);
          })
          .catch(err =>{
            this.state.isSending = false;
            this.$router.push({name:'productos',params:{search:'nuevos'}});
            this.showError(err)
          } );
      }
      let compra = this.summary;
        axios.post('/api/compras', compra)
        .then()
        .catch();
    }
  }
};
</script>

<style>
</style>
