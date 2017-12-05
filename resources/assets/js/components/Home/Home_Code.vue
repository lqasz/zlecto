export default {
    data: function() {
        return {
            data: {
                zlecenia: [],
                kategorie: [],
            },
        }
    },

    created() {
        this.fetchOrders();
    },

    methods: {
        fetchOrders() {
            axios.get('v1/glowna').then((res) => {
                this.data.zlecenia = res.data.zlecenia;
                this.data.kategorie = res.data.kategorie;
            });
        },
    },
}