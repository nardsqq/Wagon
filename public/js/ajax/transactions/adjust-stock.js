var app = new Vue({
    el: '#stock-form',
    created(){
        var self = this;
        axios.get('/admin/transactions/adjust-stock-form-data')
            .then(function (response){
                self.products = response.data.products;
                self.selected_product = self.products[0];
                
                self.actions = response.data.actions;
                
            });
    },
    data(){
        return {
            products: [],
            selected_product: {},
            actions: [],
            selected_variant: {},
            selected_variants: []
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
        },
        submitForm: function(){
            var form = $('#adjust-stock-form'),
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
        },
        cancel: function(){
            if(confirm('Do you really want to leave? Your changes will not be saved')){
                window.location.assign('/admin/transactions/adjust-stock');
            }
        }
    }
});