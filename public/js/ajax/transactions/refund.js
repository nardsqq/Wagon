var app = new Vue({
    el: '#refund',
    methods:{
        getInvoice: function(){
            var self = this;
            axios.get('/admin/transactions/refund/'+self.invoice_no)
                .then(function (response){
                    if(response.data.alert == 'success'){
                        self.invoice_exists = true;
                        self.invoice = response.data.invoice;

                        self.invoice_temp = JSON.parse(JSON.stringify(response.data.invoice));

                        for(var i = 0; i < self.invoice_temp.order.item_orders.length; i++)
                        {
                            self.invoice_temp.order.item_orders[i]['int_quantity'] = 0;
                        }

                    } else {
                        self.invoice_exists = false;
                        self.invoice = null;
                    }
                })
                .catch(function (error){
                    self.invoice_exists = false;
                    self.invoice = null;
                });
        },
        submitForm: function(){
            var form = $('#refund-form'),
                form_data = form.serialize();

            console.log();

            var self = this;
            var data = {
                items: self.invoice_temp
            }

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form_data,
                dataType: 'json',
                success: function(data) {
                    if(data.alert=='success'){
                        alert('Successfully Refunded!');
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
                window.location.assign('/admin/transactions/refund');
            }
        }
    },
    watch:{
        invoice_no: function(){
            this.invoice_exists = true;
        }
    },
    computed: {
        total_amount: function(){
            var self = this;
            return self.invoice_temp.order.item_orders.reduce(function(prev, item){
                return prev + ((item.variant.prices[0].dbl_price * item.int_quantity))
            }, 0)
        }
    },
    data(){
        return {
            invoice_exists: true,
            invoice_no: '',
            invoice: null,
            invoice_temp: null,
            client: {},
            order: {},
            amount_due: 0,
            amount_paid: 0,
            balance_due: 0,

            amount_received: 0,
        }
    }
});