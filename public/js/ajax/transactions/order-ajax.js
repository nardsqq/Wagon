$(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('form').on('submit', function(e){
        e.preventDefault();
    });

    // Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finish')
        .addClass('btn btn-info')
        .on('click', function(){ 
            var form = $('#process-order-form'),
                form_data = form.serialize();

            $.ajax({  
                type: form.attr('method'),  
                url: form.attr('action'),  
                data: form_data,  
                dataType: 'json',
                success: function(data) {  
                    if(data.alert=='success'){  
                        window.location.assign(data.url);
                    } else {
                        alert('Error');
                    }
                },  
                error: function (data) {  
                    var message = data.responseJSON.message ? data.responseJSON.message : 'Error!';
                    var errors = data.responseJSON.message ? '' : data.responseJSON;  
                    var error_message = '';
                    for(i in errors){  
                        error_message += errors[i] + '\n';  
                    }  
                    alert(error_message);
                }
            });
        });
    var btnCancel = $('<button></button>').text('Cancel')
        .addClass('btn btn-danger')
        .on('click', function(){ 
            if(confirm('Do you really want to leave? Your changes will not be saved')){
                window.location.assign('/admin/transactions/process-order');
            }
        });  

        
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
        'dom': 'iftp'
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

                self.terms = response.data.terms;
                self.modes = response.data.modes;
                self.downpayments = response.data.downpayments;
                self.discounts = response.data.discounts;

                self.selected_term = self.terms[0];
                self.selected_mode = self.modes[0];
                self.selected_downpayment = '';
                self.selected_discount = '';

                self.selected_product = self.products[0];
                self.services = response.data.services;

                $('#smartwizard').smartWizard("reset");
            });
    },
    data(){
        return {
            clients: [],
            client: {},
            selected_client: {},
            products: [],
            services: [],
            terms: [],
            modes: [],
            downpayments: [],
            discounts: [],
            delivery_option: 0, // 0 - delivery, 1 - pick-up
            order_type: 0, // 0 - product, 1 - service, 2 - product & service 
            selected_term: {},
            selected_mode: {},
            selected_downpayment: '',
            selected_discount: '',
            selected_product: {},
            selected_variant: {},
            selected_variants: [],
            selected_services: [],
            order_num: ''
        }
    },
    computed: {
        variants: function(){
            return this.selected_product.variants;
        },
        total: function(){
            var sum = 0;
            if(this.order_type == 0){
                _.forEach(this.selected_variants, function(p){ sum += (p.quantity * p.price); });
            }
            return sum;
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
            return !this.isSelected(variant.int_var_id) ? (variant.quantity = 1, this.selected_variants.push(variant)) : this.selected_variants = _.remove(this.selected_variants, function(v){
                return v.int_var_id != variant.int_var_id;
            });
        },
        isSelected: function(id){
            return _.findIndex(this.selected_variants, ['int_var_id', id]) != -1;
        }
    }
});