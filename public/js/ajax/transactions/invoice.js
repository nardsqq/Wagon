var app = new Vue({
    el: '#invoice',
    methods:{
        getInvoice: function(){
            var self = this;
            axios.get('/admin/transactions/invoice/'+self.order_no)
                .then(function (response){
                    if(response.data.alert == 'success'){
                        self.order_exists = true;

                        // self.invoice = response.data.invoice;
                        self.invoice_url = response.data.invoice_url;
                    } else {
                        self.order_exists = false;
                        self.invoice = null;
                        self.invoice_url = '';
                    }
                })
                .catch(function (error){
                    self.order_exists = false;
                    self.invoice = null;
                    self.invoice_url = '';
                });
        },
        printInvoice: function(){
            return document.getElementById("invoice_print").contentWindow.print();
        },
        submitForm: function(){
            var form = $('#invoice-form'),
                form_data = form.serialize(),
                self = this;

            $.ajax({  
                type: form.attr('method'),
                url: form.attr('action'),  
                data: form_data,  
                dataType: 'json',
                success: function(data) {  
                    if(data.alert=='success'){  
                        self.invoice = data.invoice;
                        // window.location.assign(data.url);
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
                window.location.assign('/admin/transactions/invoice');
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
            order_exists: true,
            order_no: '',
            invoice: null,
            invoice_url: ''
        }
    }
});