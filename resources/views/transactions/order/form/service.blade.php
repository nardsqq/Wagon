

<div class="col-xs-12 m-t-10">
        {!! Form::label('int_prod_id_fk', 'Service') !!}
        <input v-for="s in selected_services" :key="s.int_service_id" type="hidden" name="service_id[]" :value="s.int_service_id">
        <select id="service_select" class="form-control" v-model="selected_services" multiple>
            <option v-for="service in services" :key="service.int_service_id" :value="service">@{{ service.str_service_name }}</option>
        </select>
    </div>

    <div class="col-xs-12 m-t-30">
        <hr>
        <h3>Selected Services</h3>
        <div class="col-xs-3">
            <div class="list-group">
                <a v-for="(service, index) in selected_services" :key="service.int_service_id" href="#" :class="'list-group-item' + (service === current_service ? ' active' : '')" @click="selectService(service)">@{{ service.str_service_name }} <span @click.prevent="removeService(index)" title="Remove" class="fa fa-remove pull-right"></span></a>
            </div>
        </div>
        <div class="col-xs-9">
            <table id="selected_prod_dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Material</th>
                            <th class="text-center">Type of Acquisition</th>
                            <th class="text-center">Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="!current_service || !current_service.materials || current_service.materials.length <= 0">
                            <td colspan="3" class="text-center">No materials needed</td>
                        </tr>
                        <tr v-else v-for="material in current_service.materials" :key="material.int_mat_id">
                            <td>@{{ material.product.str_product_name }}
                                <input type="hidden" name="materials[]" :value="material.int_mat_id">
                            </td>
                            <td>
                                <select class="form-control" :name="'acqui_type['+material.int_mat_id+']'" v-model="material.acqui_type">
                                <option v-for="(type, index) in acqui_types" :key="index" :value="index">@{{type}}</option>
                                </select>
                            </td>
                            <td style="max-width: 70px;">
                                <input :name="'quantity['+material.int_mat_id+']'"  type="number" placeholder="Quantity" class="form-control" min="1" :max="material.variant? material.variant.stock:999" v-model.number="material.quantity">
                            </td>
                            <td><button v-if="material.acqui_type!=2" type="button" class="btn btn-sm btn-info">Select Variant</button></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    
    