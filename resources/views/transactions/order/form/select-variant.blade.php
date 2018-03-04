<div v-if="order_type==1 && !isEmpty(current_material)" class="modal fade" id="select_material_variant" role="dialog" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info" id="service-modal-header">
                <h4 >Select Variant for @{{current_material.product.str_product_name }}</h4>
            </div>
            <div class="modal-body">
                <table id="prod_dataTable" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">Variant</th>
                            <th class="text-center">Specifications</th>
                            <th class="text-center">Current Stock</th>
                            <th class="text-center">Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="variant in current_material.product.variants" :key="variant.int_var_id"  :class="{'info': current_material.variant.int_var_id == (variant.int_var_id) }">
                            <td>@{{ variant.str_var_name }}</td>
                            <td>
                                <span v-for="specs in variant.specs" :key="specs.int_specs_id">
                                    <strong>@{{ specs.prod_attrib.attribute.str_attrib_name }}: </strong> @{{ specs.str_spec_constant }}<br>
                                </span>
                            </td>
                            <td>@{{ variant.stock }}</td>
                            <td class="text-right">@{{ variant.price | money }}</td>
                            <td style="max-width: 47px;">
                                <button type="button" class="btn btn-sm btn-primary" @click="selectMaterialVariant(variant, $event)" :disabled="current_material.variant.int_var_id == (variant.int_var_id)">Select</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>