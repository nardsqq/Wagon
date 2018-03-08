<div class="col-xs-12  m-t-10">
    <label for="po_client" required>Client</label>
    <div>
        <label>
            {!! Form::radio('existing_client', 0, true, ['v-model'=>'existing_client']); !!}
            Existing Client
        </label>
        
        <label>
            {!! Form::radio('existing_client', 1, false, ['v-model'=>'existing_client']); !!}
            New Client
        </label>
    </div>
    <input type="hidden" name="client_id" :value="selected_client.int_client_id">
    <select id="po_client" class="form-control" v-model="selected_client" v-if="existing_client == 0">
        <option v-for="client in clients" :key="client.int_client_id" :value="client">@{{ client.str_client_name }}</option>
    </select>
    <div v-if="existing_client == 1">
        <label for="str_client_name" required>Client Name</label>
        {{ Form::text('str_client_name', null, ['class'=>'form-control', 'v-model'=>'selected_client.str_client_name']) }}
    </div>
</div>


<div class="col-xs-12  m-t-10">
    <label for="billing_address" required>Billing Address</label>
    {{ Form::textarea('billing_address', null, ['class'=>'form-control', 'rows'=>4, ':value'=>'selected_client.txt_client_address', 'v-if'=>'existing_client==0']) }}
    {{ Form::textarea('billing_address', null, ['class'=>'form-control', 'rows'=>4, 'v-model'=>'selected_client.txt_client_address', 'v-else']) }}
</div>

<div class="col-xs-12  m-t-10">
    <label for="contact_no" required>Contact No.</label>
    {{ Form::text('contact_no', null, ['class'=>'form-control',':value'=>'selected_client.str_client_mobile_num', 'v-if'=>'existing_client==0']) }}
    {{ Form::text('contact_no', null, ['class'=>'form-control','v-model'=>'selected_client.str_client_mobile_num', 'v-else']) }}
</div>

<div class="col-xs-12  m-t-10">
    <label for="contact_person" required>Contact Person</label>
    {{ Form::text('contact_person', null, ['class'=>'form-control', ':value'=>'selected_client.str_client_person', 'v-if'=>'existing_client==0']) }}
    {{ Form::text('contact_person', null, ['class'=>'form-control', 'v-model'=>'selected_client.str_client_person', 'v-else']) }}
</div>
    
<hr>
<div v-if="existing_client == 1">
    <div class="col-xs-12  m-t-10">
        <label for="landmark" required>Landmark</label>
        {{ Form::text('landmark', null, ['class'=>'form-control', 'v-model'=>'selected_client.str_client_landmark']) }}
    </div>
{{--  
    <div class="col-xs-6  m-t-10">
        {!! Form::label('str_client_mobile_num', 'Mobile Number', ['required'=>'required']) !!}
        {!! Form::text('str_client_mobile_num', null, ['id' => 'str_client_mobile_num', 'class' => 'form-control', ':value'=>'selected_client.str_client_mobile_num']) !!}
    </div>  --}}
    <div class="col-xs-6  m-t-10">
        {!! Form::label('str_client_tel_num', 'Telephone Number', ['required'=>'required']) !!}
        {!! Form::text('str_client_tel_num', null, ['id' => 'str_client_tel_num', 'class' => 'form-control', 'v-model'=>'selected_client.str_client_tel_num']) !!}
    </div>
    <div class="col-xs-12 m-t-10">
        {!! Form::label('str_client_email', 'Email Address', ['required'=>'required']) !!}
        {!! Form::text('str_client_email', null, ['id' => 'str_client_email', 'class' => 'form-control', 'v-model'=>'selected_client.str_client_email']) !!}
    </div>
    <div class="col-xs-6  m-t-10">
        {!! Form::label('str_client_tin', 'Taxpayer Identification Number', ['required'=>'required']) !!}
        {!! Form::text('str_client_tin', null, ['id' => 'str_client_tin', 'class' => 'form-control', 'v-model'=>'selected_client.str_client_tin']) !!}
    </div>
</div>