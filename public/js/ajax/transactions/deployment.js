var app = new Vue({
    el: '#deployment',
    mounted() {
        this.getServicesData()
    },
    watch: {
        selected_order: function() {
            this.getServices();
        }
    },
    methods:{
        getServicesData: function() {
            var self = this;
            axios.get('/admin/transactions/process-deployment-order-data')
                .then(function (response){
                    if(response.data.alert == 'success'){
                        self.service_orders_all = response.data.service_orders;
                    }
                });
        },
        getServices: function() {
            var self = this;
            axios.get('/admin/transactions/process-deployment/get-service-orders/' + this.selected_order)
                .then(function (response){
                    if(response.data.alert == 'success'){
                        self.service_orders = response.data.service_orders;
                    }
                });
        },
        isServiceDisabled: function (service) {
            var self = this;
            var ids = _.map(self.service_orders_all, 'int_ss_service_order_id_fk');
            var index = ids.indexOf(service);
            console.log(index);
            if(index != -1)
                return true;
            else
                return false;

        },
        isPersonDisabled: function (person) {
            var self = this;
            var ids = _.map(self.previous_personnel, 'int_personnel_id_fk');
            var index = ids.indexOf(person.int_personnel_id);
            if(index != -1)
                return true;
            else
                return false;

        },
        addPersonnel: function() {
            this.added_personnel.push({"int_personnel_id": this.selected_personnel,"name": $('#select_person option:selected').text()});
        },
        removePersonnel: function(personnel) {
            var index = _.findIndex(this.added_personnel, personnel);
            this.added_personnel.splice(index, 1);
        },
        assignPersonnelModal: function(schedule) {
            var self = this;
            axios.get('/admin/transactions/process-deployment/' + schedule.int_sched_id)
                .then(function (response){
                    if(response.data.alert == 'success'){
                        console.log();
                        self.previous_personnel = response.data.personnel;
                        $('#orderNumber').text(response.data.order);
                        $('#serviceName').text(response.data.service);
                        $('#locationAddress').text(response.data.location);
                        $('#mobilization').text(response.data.service_schedule.dat_start);
                        $('#de_mobilization').text(response.data.service_schedule.dat_end);
                    }
                });

            self.selected_personnel = '';
            $('#service_schedule_id').val(schedule.int_sched_id);
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
            service_orders: null,
            service_orders_all: null,
            amount_due: 0,
            amount_paid: 0,
            balance_due: 0,
            amount_received: 0,
            selected_invoice: '',
            refund: null,
            selected_order: '',
            selected_personnel: null,
            added_personnel: [],
            check_service: false,
            selected_service_order: null

        }
    }
});