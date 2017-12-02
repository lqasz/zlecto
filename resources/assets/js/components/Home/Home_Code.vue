export default {
    data: function() {
        return {
            zlecenia: [],
        }
    },

    created() {
        this.fetchOrders();
    },

    methods: {
        fetchOrders() {
            axios.get('v1/zlecenia').then((res) => {
                this.zlecenia = res.data;
            });
        },
    },
}