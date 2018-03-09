var app = new Vue({
    el: '#refund',
    mounted(){
        this.fetchPaymentsData()
    },
    methods:{
        verifyQuantity: function(item) {
            var self = this;
            var ids = _.map(self.invoice_temp.order.item_orders, 'int_item_order_id');
            var index = ids.indexOf(item.int_item_order_id);
            if(item.int_quantity > self.invoice.order.item_orders[index].int_quantity)
            {
                item.int_quantity = self.invoice.order.item_orders[index].int_quantity
            }
            else if(item.int_quantity < 0)
                item.int_quantity = 0;
        },
        fetchPaymentsData: function(){
            var self = this;
            axios.get('/admin/transactions/refund-payments-data').then(function(response) {
                self.payments = response.data.payments;
            });
        },
        getInvoice: function(){
            var self = this;
            axios.get('/admin/transactions/refund-'+self.selected_invoice)
                .then(function (response){
                    if(response.data.alert == 'success'){
                        self.invoice_exists = true;
                        self.invoice = response.data.invoice;
                        self.refund = response.data.refund;
                        self.invoice_temp = JSON.parse(JSON.stringify(response.data.invoice));

                        // set quantity to 0
                        for(var i = 0; i < self.invoice_temp.order.item_orders.length; i++)
                        {
                            self.invoice_temp.order.item_orders[i]['int_quantity'] = 0;
                        }

                        // if there are previous refunds, check the quantity left
                        if(self.refund)
                        {

                            var ids = _.map(self.invoice_temp.order.item_orders, 'int_item_order_id');
                            for(var i = 0; i < self.refund.length; i++)
                            {
                                for (var j = 0; j < self.refund[i].items.length; j++) {
                                    var index = ids.indexOf(self.refund[i].items[j].int_ref_item_item_order_id_fk);
                                    self.invoice.order.item_orders[index].int_quantity -= self.refund[i].items[j].int_return_quantity;
                                }
                            }
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
        },
        selected_invoice: function () {
            this.getInvoice();
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
            payments: null,
            client: {},
            order: {},
            amount_due: 0,
            amount_paid: 0,
            balance_due: 0,
            amount_received: 0,
            selected_invoice: '',
            refund: null
        }
    },
});