<div class="well">
    <div class="row">
        <div class="col-xs-6">
            <dl>
                <dt>Purhase Order Number</dt>
                <dd><h3>@{{ order_num }}</h3></dd>
            </dl>
            <dl>
                <dt>Client</dt>
                <dd>@{{ selected_client.str_client_name }}</dd>
            </dl>
            <dl>
                <dt>Delivery Type</dt>
                <dd>@{{ delivery_option == 0? 'Delivery' : 'Pick-up' }}</dd>
            </dl>
        </div>
        <div class="col-xs-6">
            <dl>
                <dt>Payment Term</dt>
                <dd>@{{ selected_term.desc }}</dd>
            </dl>
        
            <dl>
                <dt>Mode of Payment</dt>
                <dd>@{{ selected_mode.desc }}</dd>
            </dl>
        
            <dl>
                <dt>Downpayment</dt>
                <dd>@{{ !selected_downpayment.desc ? 'No downpayment' : selected_downpayment.desc+'%' }}</dd>
            </dl>
        
            <dl>
                <dt>Discount</dt>
                <dd>@{{ !selected_discount.desc ? 'No discount' : selected_discount.desc+'%' }}</dd>
            </dl>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered table-condensed" v-if="order_type == 0">
            <thead>
                <tr>
                    <th class="text-center">Product</th>
                    <th class="text-center">Variant</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="selected_variants.length === 0">
                    <td colspan="5" class="text-center">No items selected</td>
                </tr>
                <tr v-else v-for="variant in selected_variants" :key="variant.int_var_id">
                    <td>@{{ variant.product.str_product_name }}</td>
                    <td>
                        <span v-for="specs in variant.specs" :key="specs.int_specs_id">
                            <strong>@{{ specs.prod_attrib.attribute.str_attrib_name }}: </strong> @{{ specs.str_spec_constant }}<br>
                        </span>
                    </td>
                    <td>@{{ variant.price }}</td>
                    <td>@{{ variant.quantity }}</td>
                    <td>@{{ variant.price * variant.quantity }}</td>
                </tr>
                <tr>
                    <th colspan="5"><h4>Total</h4></th>
                    <td>@{{ total }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-condensed" v-else>

        </table>

    </div>
</div>