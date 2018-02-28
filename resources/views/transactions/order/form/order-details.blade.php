<div class="col-xs-12  m-t-10">
    <label for="order_num">Purchase Order Number</label>
    {{ Form::text('order_num', null,['class'=>'form-control', 'v-model'=>'order_num']) }}
</div>

<div class="col-xs-12  m-t-10">
    <label for="po_client">Client</label>
    <input type="hidden" name="client_id" :value="selected_client.int_client_id">
    <select id="po_client" class="form-control" v-model="selected_client">
        <option v-for="client in clients" :key="client.int_client_id" :value="client">@{{ client.str_client_name }}</option>
    </select>
</div>

<hr>

<div class="col-xs-12  m-t-10">
    <label class="control-label">Delivery Type</label>
    <div>
        <label>
            {!! Form::radio('delivery_type', 0, true, ['v-model'=>'delivery_option']); !!}
            Delivery
        </label>
        
        <label>
            {!! Form::radio('delivery_type', 1, false, ['v-model'=>'delivery_option']); !!}
            Pick-up
        </label>
    </div>
</div>

<div class="col-xs-12  m-t-10" v-if="delivery_option == 0">
    <label for="delivery_location">Delivery Location</label>
    {{ Form::textarea('delivery_location', null,['class'=>'form-control', 'rows'=>4, ':value'=>'selected_client.txt_client_address']) }}
</div>

<div class="col-xs-12  m-t-10" v-if="delivery_option == 0">
    <label for="landmark">Landmark</label>
    {{ Form::text('landmark', null, ['class'=>'form-control', ':value'=>'selected_client.str_client_landmark']) }}
</div>

<hr>

<div class="col-xs-12  m-t-10">
    <label for="billing_address">Billing Address</label>
    {{ Form::textarea('billing_address', null, ['class'=>'form-control', 'rows'=>4, ':value'=>'selected_client.txt_client_address']) }}
</div>

<div class="col-xs-12  m-t-10">
    <label for="contact_no">Contact No.</label>
    {{ Form::text('contact_no', null, ['class'=>'form-control', ':value'=>'selected_client.contact']) }}
</div>

<div class="col-xs-12  m-t-10">
    <label for="contact_person">Contact Person</label>
    {{ Form::text('contact_person', null, ['class'=>'form-control', ':value'=>'selected_client.str_client_person']) }}
</div>

<div class="col-xs-12  m-t-10">
    <label class="control-label">Order Type</label>
    <div>
        <label>
            {!! Form::radio('order_type', 0, true,['v-model'=>'order_type']); !!}
            Product
        </label>
        
        <label>
            {!! Form::radio('order_type', 1, false,['v-model'=>'order_type']); !!}
            Service
        </label>
    </div>
</div>