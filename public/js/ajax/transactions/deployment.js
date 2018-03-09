var app = new Vue({
    el: '#deployment',
    created(){
        var self = this;
        axios.get('/admin/transactions/process-deployment-form-data')
            .then(function (response){
                self.orders = response.data.orders;
                self.personnels = response.data.personnels;
            });
    },
    methods:{
        isEmpty: function(item){
            return _.isEmpty(item);
        },
        getServiceOrders: function(){
            this.order = this.orders[_.findIndex(this.orders, (o)=>{
                return o.int_order_id =  this.order_no})];
        },
        submitForm: function(){
            var form = $('#deployment-form'),
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
                window.location.assign('/admin/transactions/process-deployment');
            }
        }
    },
    data(){
        return {
            order_no: '',
            orders: [],
            personnels: {},
            order: null,
        }
    }
});