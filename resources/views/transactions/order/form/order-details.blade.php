<div class="col-xs-12  m-t-10">
    <label for="order_num">Purchase Order Number</label>
    {{ Form::text('order_num', null,['class'=>'form-control', 'v-model'=>'order_num[order_type]', 'placeholder'=>'Purchase Order Number','readonly'=>true]) }}
</div>
<hr>

<div class="col-xs-12  m-t-10">
    <label class="control-label" required>Delivery Type</label>
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
    <label for="delivery_location" required>Delivery Location</label>
    {{ Form::textarea('delivery_location', null,['class'=>'form-control', 'rows'=>4, ':value'=>'selected_client.txt_client_address']) }}
</div>

<div class="col-xs-12  m-t-10" v-if="delivery_option == 0">
    <label for="landmark">Landmark</label>
    {{ Form::text('landmark', null, ['class'=>'form-control', ':value'=>'selected_client.str_client_landmark']) }}
</div>

<hr>

<div class="col-xs-12  m-t-10">
    <label class="control-label" required>Order Type</label>
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