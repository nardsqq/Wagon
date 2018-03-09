var app = new Vue({
    el: '#deployment',
    mounted() {
    },
    methods:{
        addPersonnel: function() {
            this.added_personnel.push({"int_personnel_id": this.selected_personnel,"name": $('#select_person option:selected').text()});
        },
        removePersonnel: function(personnel) {
            var index = _.findIndex(this.added_personnel, personnel);
            this.added_personnel.splice(index, 1);
        },
        assignPersonnelModal: function(id) {
            var self = this;
            axios.get('/admin/transactions/process-deployment/' +id)
                .then(function (response){
                    if(response.data.alert == 'success'){
                        console.log();
                        self.previous_personnel = response.data.personnel;
                    }
                });

            $('#service_schedule_id').val(id);
            $('#assign-modal').modal('show');
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
                        alert('Success!');
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
        submitAssignForm: function(){
            var form = $('#assign-form'),
                form_data = form.serialize();
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form_data,
                dataType: 'json',
                success: function(data) {
                    if(data.alert=='success'){
                        alert('Success!');
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
            previous_personnel: null,
            invoice_exists: true,
            invoice_no: '',
            invoice: null,
            invoice_temp: null,
            payments: null,
            client: {},
            order: null,
            service_order: null,
            amount_due: 0,
            amount_paid: 0,
            balance_due: 0,
            amount_received: 0,
            selected_invoice: '',
            refund: null,
            selected_order: '',
            selected_personnel: '',
            added_personnel: [],

        }
    }
});