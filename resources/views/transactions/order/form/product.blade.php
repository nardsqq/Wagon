
<div class="col-xs-12 m-t-10">
    {!! Form::label('int_prod_id_fk', 'Product') !!}
    <input type="hidden" name="product_id" :value="selected_product.int_product_id">
    <select name="int_prod_id_fk" id="int_prod_id_fk" class="form-control" v-model="selected_product">
        <option v-for="product in products" :key="product.int_product_id" :value="product">@{{ product.str_product_name }}</option>
    </select>
</div>

<div class="col-xs-12 m-t-30">
    <table id="prod_dataTable" class="table table-bordered table-hover">
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
            <tr v-for="variant in variants" :key="variant.int_var_id"  :class="{'selected': isSelected(variant.int_var_id) }">
                <td>@{{ variant.str_var_name }}</td>
                <td>
                    <span v-for="specs in variant.specs" :key="specs.int_specs_id">
                        <strong>@{{ specs.prod_attrib.attribute.str_attrib_name }}: </strong> @{{ specs.str_spec_constant }}<br>
                    </span>
                </td>
                <td>@{{ variant.stock }}</td>
                <td class="text-right">@{{ variant.price | money }}</td>
                <td style="max-width: 47px;">
                    <button type="button" class="btn btn-sm btn-primary" @click="selectVariant(variant, $event)">@{{ !isSelected(variant.int_var_id) ? 'Select' : 'Remove' }}</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-xs-12 m-t-30">
    <hr>
    <h3>Selected Items</h3>
    <table id="selected_prod_dataTable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center">Product</th>
                <th class="text-center">Variant</th>
                <th class="text-center">Current Stock</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Cost</th>
                <th class="text-center">Remarks</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="selected_variants.length === 0">
                <td colspan="8" class="text-center">No items selected</td>
            </tr>
            <tr v-else v-for="variant in selected_variants" :key="variant.int_var_id">
                <td>@{{ variant.product.str_product_name }}
                    <input type="hidden" name="variants[]" :value="variant.int_var_id">
                </td>
                <td>@{{ variant.str_var_name }}</td>
                <td>@{{ variant.stock }}</td>
                <td class="text-right">@{{ variant.price | money }}</td>
                <td style="max-width: 70px;">
                    <input :name="'quantity['+variant.int_var_id+']'"  type="number" placeholder="Quantity" class="form-control" min="1" :max="variant.stock" v-model.number="variant.quantity">
                </td>
                <td class="text-right">@{{ (variant.price * variant.quantity) | money }}</td>                        
                <td><input :name="'remarks['+variant.int_var_id+']'" type="text" placeholder="Remarks" class="form-control"></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" @click="selectVariant(variant, $event)">Remove</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

