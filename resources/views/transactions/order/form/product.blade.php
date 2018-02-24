<div class="col-xs-12 m-t-10">
    <div class="col-xs-12 m-t-10">
        {!! Form::label('int_prod_id_fk', 'Product') !!}
        <input type="hidden" name="product_id" :value="selected_product.int_product_id">
        <select name="int_prod_id_fk" id="int_prod_id_fk" class="form-control" v-model="selected_product">
            <option v-for="product in products" :key="product.int_product_id" :value="product">@{{ product.str_product_name }}</option>
        </select>
    </div>

    <div class="row m-t-10">
        <div class="col-xs-12 panel-body" id="table-container">
            <table id="prod_dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Variant</th>
                        <th class="text-center">Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="variant in variants" :key="variant.int_var_id"  :class="{'selected': isSelected(variant.int_var_id) }">
                        <td>
                            <span v-for="specs in variant.specs" :key="specs.int_specs_id">
                                <strong>@{{ specs.prod_attrib.attribute.str_attrib_name }}: </strong> @{{ specs.str_spec_constant }}<br>
                            </span>
                        </td>
                        <td>@{{ variant.price }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" @click="selectVariant(variant, $event)">@{{ !isSelected(variant.int_var_id) ? 'Select' : 'Remove' }}</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-xs-12 m-t-10">
    <div class="row m-t-10">
        <div class="col-xs-12 panel-body" id="table-container">
            <table id="selected_prod_dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Product</th>
                        <th class="text-center">Variant</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Remarks</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="selected_variants.length === 0">
                        <td colspan="6" class="text-center">No items selected</td>
                    </tr>
                    <tr v-else v-for="variant in selected_variants" :key="variant.int_var_id">
                        <td>@{{ variant.product.str_product_name }}</td>
                        <td>
                            <span v-for="specs in variant.specs" :key="specs.int_specs_id">
                                <strong>@{{ specs.prod_attrib.attribute.str_attrib_name }}: </strong> @{{ specs.str_spec_constant }}<br>
                            </span>
                        </td>
                        <td>@{{ variant.price }}</td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" @click="selectVariant(variant, $event)">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

