export default {
    computed: {
        status() {
            let color = null;
            let txt = null;
            switch (this.producto.estado_id) {
                case 'R':
                    color = "red";
                    txt = "Sin Stock";
                    break;
                case 'A':
                    color = "orange";
                    txt = "Ultimos disponibles";
                    break;
                case 'V':
                    color = "green";
                    txt = "Stock Disponible";
                    break;
                case 'P':
                    color = "red";
                    txt = "Sin Stock Disponible";

                    break;
            }

            return {
                color,
                txt,
            };
        },
        abreviatura() {
            let abrev = 'c/u';
            if (this.producto.um === 'PAR')
                abrev = 'c/par';
            if (this.producto.um === 'JGO' || this.producto.um === 'BJ')
                abrev = 'c/jgo';

            return abrev;
        },
        presentacion() {
            let unidad = 'unidad';
            if (this.producto.umq > 1)
                unidad = 'unidades';

            if (this.producto.um === 'PAR') {
                unidad = 'par';

                if (this.producto.umq > 1)
                    unidad = 'pares';
            }
            if (this.producto.um === 'JGO' || this.producto.um === 'BJ') {
                unidad = 'juego';

                if (this.producto.umq > 1)
                    unidad = 'juegos';
            }


            return 'Cantidad por Envase: ' + this.producto.umq + ' ' + unidad;
        },
        total() {
            return 'Total envase: $' + (this.producto.umq * this.producto.precio_actual).toFixed(2);
        },
        labelClass() {
            let label = this.producto.is_new ? 'Nuevo' : null;

            if (this.producto.is_oferta)
                label = 'Oferta';
            if (this.producto.is_combo)
                label = 'Combo';
            if (this.producto.is_promo)
                label = 'Promo';
            return label;
        },
    },
    props: {
        producto: {
            type: Object,
            required: true,
        },
    },
    mounted() { },
    methods: {
        close() {
            this.$emit('close');
        },
    }
}
