export default {
    computed: {
        status() {
            let color = null;
            let txt = null;
            switch (item.producto[0].estado_id) {
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


        total() {
            return 'Total envase: $' + (item.producto[0].umq * item.producto[0].precio_actual).toFixed(2);
        },
        labelClass() {
            let label = item.producto[0].is_new ? 'Nuevo' : null;

            if (item.producto[0].is_oferta)
                label = 'Oferta';
            if (item.producto[0].is_combo)
                label = 'Combo';
            if (item.producto[0].is_promo)
                label = 'Promo';
            return label;
        },
    },
    mounted() { },
    methods: {
        close() {
            this.$emit('close');
        },
    }
}
