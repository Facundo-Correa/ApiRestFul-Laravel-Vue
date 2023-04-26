<template>
  <div id="index" style="background-color: #ebebeb">
    <div class="container-fluid p-0">
      <template>
        <div class="container pb-4">
          <div class="row">
            <div class="col-12 mb-5">
              <iframe
                class="w-100"
                height="288"
                frameborder="0"
                scrolling="no"
                marginheight="0"
                marginwidth="0"
                src="http://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=buenos+aires+pinto+3545&amp;aq=&amp;sll=-34.553384,-58.476684&amp;sspn=0.007502,0.018024&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Pinto+3545,+Saavedra,+Ciudad+Aut%C3%B3noma+de+Buenos+Aires&amp;t=m&amp;ll=-34.553013,-58.475075&amp;spn=0.010179,0.012317&amp;z=15&amp;iwloc=&amp;output=embed"
              ></iframe>
            </div>
            <div class="col-12 contact_area">
              <div class="row">
                <div class="col-lg-6 col-md-12 pr-5">
                  <div class="contact_message content">
                    <h3>Contactanos</h3>
                    <p>
                      Si desea contactarse con nosotros puede hacerlo a través
                      de los siguientes medios o completando el formulario adjunto
                      y a la brevedad nos pondremos en contacto con usted.
                    </p>
                    <ul>
                      <li class="datos">
                        <i class="fas fa-map-marked-alt"></i> Direccion: Pinto 3545, Capital Federal, Argentina
                      </li>
                      <li class="datos">
                        <i class="fa fa-phone"></i> Telefono: {{ $V_TELEFONO }}
                      </li>
                      <li class="datos">
                        <i class="fa fa-whatsapp"></i> WhatsApp: {{ $V_WHATSAPP }}
                      </li>
                      <li class="datos">
                        <i class="fas fa-fax"></i> Fax: {{ $V_FAX }}
                      </li>
                      <li class="datos">
                        <i class="fas fa-envelope"></i> Email: ventas@mlrepuestos.com.ar
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="contact_message form">
                    <h3>Formulario de consulta</h3>
                    <form @submit.prevent="sendConsulta" method="post" id="contact-form">
                      <p>
                        <label>Nombre y Apellido *</label>
                        <input
                          name="name"
                          placeholder="Nombre y Apellido"
                          type="text"
                          v-model="form.nombre"
                        />
                      </p>
                      <p>
                        <label>Email *</label>
                        <input name="email" placeholder="Email" type="email" v-model="form.email" />
                      </p>
                      <p>
                        <label>Empresa</label>
                        <input
                          name="subject"
                          placeholder="Nombre de la empresa"
                          type="text"
                          v-model="form.empresa"
                        />
                      </p>
                      <p>
                        <label>Telefono</label>
                        <input
                          name="subject"
                          placeholder="Telefono"
                          type="text"
                          v-model="form.telefono"
                        />
                      </p>
                      <p>
                        <label>Celular</label>
                        <input
                          name="subject"
                          placeholder="Telefono celular"
                          type="text"
                          v-model="form.celular"
                        />
                      </p>
                      <div class="contact_textarea">
                        <label>Mensaje *</label>
                        <textarea
                          placeholder="Mensaje"
                          name="message"
                          class="form-control2"
                          v-model="form.mensaje"
                        ></textarea>
                      </div>
                      <button type="submit">Enviar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        nombre: null,
        email: null,
        empresa: null,
        telefono: null,
        celular: null,
        mensaje: null
      }
    };
  },
  mounted() {},
  props: [],
  methods: {
    sendConsulta() {
      axios
        .post("/api/consultas", this.form)
        .then(res => {
          this.$noty.success(res.data.data);
          this.form = {
            nombre: null,
            email: null,
            empresa: null,
            telefono: null,
            celular: null,
            mensaje: null
          };
        })
        .catch(err => {
          console.log(err);
          this.showError(err);
        });
    }
  }
};
</script>

<style scoped lang="scss">
li.datos {
  transition: all 0.3s ease 0s;
}

li.datos:hover {
  color: #4595c2;
}
</style>
