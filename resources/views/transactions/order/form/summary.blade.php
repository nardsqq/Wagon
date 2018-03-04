<div class="well">
    <div class="row">
        <div class="col-xs-6">
            <dl>
                <dt>Purchase Order Number</dt>
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
                <dd>@{{ selected_term.str_terms_pay_name }}</dd>
            </dl>
        
            <dl>
                <dt>Mode of Payment</dt>
                <dd>@{{ selected_mode.str_mode_pay_name }}</dd>
            </dl>
        
            <dl>
                <dt>Downpayment (@{{selected_downpayment.int_down_percentage}}%)</dt>
                <dd>@{{ downpayment | money }}</dd>
            </dl>
        
            <dl>
                <dt>Discount: @{{ selected_discount.str_discount_name }} (@{{ selected_discount.int_discount_percentage }}%)</dt>
                <dd>@{{ discount | money }}</dd>
            </dl>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div v-if="order_type == 0">
            <h3>Products</h3>
            <table class="table table-bordered table-condensed">
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
                        <td>@{{ variant.str_var_name }}</td>
                        <td class="text-right">@{{ variant.price | money }}</td>
                        <td class="text-right">@{{ variant.quantity }}</td>
                        <td class="text-right">@{{ (variant.price * variant.quantity) | money }}</td>
                    </tr>
                    <tr>
                        <th colspan="4"><h4>Total</h4></th>
                        <td><h4 class="text-right">@{{ total_amount | money }}</h4></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div v-else>
            <h3>Services</h3>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">Service</th>
                        <th class="text-center">Service Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="selected_services.length <= 0">
                        <td colspan="3" class="text-center">No service selected</td>
                    </tr>
                    <tr v-else v-for="(service, index) in selected_services" :key="service.int_service_id">
                        <td>@{{ service.str_service_name }}</td>
                        <td class="text-right">@{{ service.dbl_service_price | money}}</td>
                    </tr>
                    <tr>
                        <td><h4>Total (Services)</h4></td>
                        <td class="text-right"><h4>@{{ total_services | money}}</h4></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            
            <h3>Materials</h3>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">Material</th>
                        <th class="text-center">Type of Acquisition</th>
                        <th class="text-center">Variant</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="materials.length <= 0">
                        <td colspan="6" class="text-center">No materials needed</td>
                    </tr>
                    <tr v-else v-for="(material, index) in materials" :key="material.int_material_id">
                        <td>@{{ material.product.str_product_name }}</td>
                        <td>@{{ acqui_types[material.acqui_type] }}</td>
                        <td>@{{ material.variant.str_var_name }}</td>
                        <td class="text-right"><span v-if="!isEmpty(material.variant)">@{{ material.variant.price | money }}</span></td>
                        <td class="text-right"><span v-if="material.acqui_type!=2 && !isEmpty(material.variant)">@{{ material.quantity }}</span></td>
                        <td class="text-right"><span v-if="material.acqui_type!=2 && !isEmpty(material.variant)">@{{ material.quantity * material.variant.price | money }}</span></td>
                    </tr>
                    <tr>
                        <td colspan="5"><h4>Total (Materials)</h4></td>
                        <td class="text-right"><h4>@{{ total_materials | money}}</h4></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h4 class="text-right">Subtotal: <span>@{{ total | money }}</span></h4>
        <h4 class="text-right">Less: Discount: <span>(@{{ discount | money }})</span></h4>
        <h3 class="text-right">Total: <span>@{{ total - discount | money }}</span></h3>
        <h5 class="text-right">Downpayment: <span>@{{ downpayment | money }}</span></h5>
        <h5 class="text-right">Balance Due: <span>@{{ total - downpayment | money }}</span></h5>
    </div>
</div>