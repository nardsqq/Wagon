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

    $('#dataTable').DataTable({
        'dom': '<if>tp'
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
                self.selected_product = self.products[0];
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
            selected_variants: [],
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
            $('#prod_dataTable').DataTable().destroy();
            this.$nextTick(function() {
                $('#prod_dataTable').DataTable({
                    'dom': 'ftip'
                });
             });
            console.log(product.int_product_id);
        }
    },
    methods: {
        // selectVariant: function(variant, event){
        //     return this.selected_variant.int_var_id === variant.int_var_id ? this.selected_variant = {} : this.selected_variant = variant;
        // },
        selectVariant: function(variant, event){
            //console.log(!this.isSelected(contract), _.find(this.selected, ['strTranHID', contract.strTranHID]));
            return !this.isSelected(variant.int_var_id) ? (this.selected_variants.push(variant)) : this.selected_variants = _.remove(this.selected_variants, function(v){
                return v.int_var_id != variant.int_var_id;
            });
            //return !this.isSelected(contract.strTranHID) ? this.selected.push(contract) : this.selected.splice(_.findIndex(this.selected, ['strTranHID', contract.strTranHID]), 1); 
        },
        isSelected: function(id){
            //console.log(id, _.findIndex(this.selected, ['strTranHID', id]) != -1);
            return _.findIndex(this.selected_variants, ['int_var_id', id]) != -1;
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