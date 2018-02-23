$(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
}); // $(document).ready(function() {});

Vue.use(VueFormWizard)

new Vue({
    el: '#create-process-order',
    data(){
        return {
            clients: [],
            products: [],
            services: [],
            delivery_option: 0, // 0 - delivery, 1 - pick-up
            order_type: 0, // 0 - product, 1 - service, 2 - product & service 
            selected_products: [],
            selected_services: []
        }
    },
    created(){
        var self = this;
        axios.get('/transactions/order/form-data')
            .then(function (response){
                self.clients = response.data.clients;
                self.products = response.data.products;
                self.services = response.data.services;
            });
    },
    methods: {
        onComplete: function(){
            return;
        },
        removeProduct: function(id){
            return;
        },
        addProduct: function(id){
            return;
        },
        removeService: function(id){
            return;
        },
        addService: function(id){
            return;
        }
    }
});