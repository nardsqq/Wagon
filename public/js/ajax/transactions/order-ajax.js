$(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finish')
        .addClass('btn btn-info')
        .on('click', function(){ alert('Finish Clicked'); });
    var btnCancel = $('<button></button>').text('Cancel')
        .addClass('btn btn-danger')
        .on('click', function(){ $('#smartwizard').smartWizard("reset"); });  

        
    $('#smartwizard').smartWizard({
        selected: 0, 
        theme: 'default',
        transitionEffect:'fade',
        showStepURLhash: false,
        toolbarSettings: {
            toolbarExtraButtons: [btnFinish, btnCancel]
        }
    });
}); // $(document).ready(function() {});

var app = new Vue({
    el: '#process-form',
    created(){
        var self = this;
        axios.get('/admin/transactions/process-order-form-data')
            .then(function (response){
                self.clients = response.data.clients;
                self.products = response.data.products;
                self.services = response.data.services;
            });
    },
    data(){
        return {
            clients: [],
            client: {},
            products: [],
            services: [],
            delivery_option: 0, // 0 - delivery, 1 - pick-up
            order_type: 0, // 0 - product, 1 - service, 2 - product & service 
            selected_product: {},
            selected_variant: {},
            selected_products: [],
            selected_services: []
        }
    },
    computed: {
        variants: function(){
            return this.selected_product.variants;
        }
    },
    watch: {
        selected_product: function(product){
            $('#dataTable').DataTable().destroy();
            this.$nextTick(function() {
	            $('#dataTable').DataTable();
             });
            console.log(product.int_product_id);
        }
    },
    methods: {
        selectVariant: function(variant, event){
            return this.selected_variant.int_var_id === variant.int_var_id ? this.selected_variant = {} : this.selected_variant = variant;
        },
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