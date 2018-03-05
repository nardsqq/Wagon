var app = new Vue({
    el: '#payment',
    methods:{
        getInvoice: function(){
            var self = this;
            axios.get('/admin/transactions/payment/'+self.invoice_no)
                .then(function (response){
                    if(response.data.alert == 'success'){
                        self.invoice_exists = true;

                        self.invoice = response.data.invoice;
                        self.client = response.data.client;
                        self.amount_due = response.data.amount_due;
                        self.amount_paid = response.data.amount_paid;
                        self.balance_due = response.data.balance_due;
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
            var form = $('#payment-form'),
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
                window.location.assign('/admin/transactions/payment');
            }
        }
    },
    watch:{
        invoice_no: function(){
            this.invoice_exists = true;
        }
    },
    data(){
        return {
            invoice_exists: true,
            invoice_no: '',
            invoice: null,
            client: {},
            order: {},
            amount_due: 0,
            amount_paid: 0,
            balance_due: 0,

            amount_received: 0,
        }
    }
});