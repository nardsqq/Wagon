
{!! Form::model($client, ['route' => ['client.update', $client->intClientID], 'method' => 'PUT']) !!}
  <div class="row">
    <div class="col-xs-6">
      <label>Client</label>
      {!! Form::select('intClientID', $prods, null, ['class' => 'form-control']) !!}﻿
    </div>
    <div class="col-xs-6">
      <label for="strClientName">Client Name</label>
      {!! Form::text('strClientName', null, ["class" => "form-control"]) !!}
    </div>
     <div class="col-xs-6">
      <label for="strClientAddLotNum">Lot Number</label>
      {!! Form::text('strClientAddLotNum', null, ["class" => "form-control"]) !!}
    </div>
     <div class="col-xs-6">
      <label for="strClientAddStreet">Street</label>
      {!! Form::text('strClientName', null, ["class" => "form-control"]) !!}
    </div>
     <div class="col-xs-6">
      <label for="strClientAddBrgy">Brgy</label>
      {!! Form::text('strClientAddStreet', null, ["class" => "form-control"]) !!}
    </div>
     <div class="col-xs-6">
      <label for="strClientAddCity">City</label>
      {!! Form::text('strClientAddCity', null, ["class" => "form-control"]) !!}
    </div>
     <div class="col-xs-6">
      <label for="strClientAddProvince">Province</label>
      {!! Form::text('strClientAddProvince', null, ["class" => "form-control"]) !!}
    </div>
      <div class="col-xs-6">
      <label for="strClientTelephone">Telephone</label>
      {!! Form::text('strClientTelephone', null, ["class" => "form-control"]) !!}
    </div>
      <div class="col-xs-6">
      <label for="strClientFax">Fax</label>
      {!! Form::text('strClientFax', null, ["class" => "form-control"]) !!}
    </div>
      <div class="col-xs-6">
      <label for="strClientMobile">Mobile</label>
      {!! Form::text('strClientMobile', null, ["class" => "form-control"]) !!}
    </div>
      <div class="col-xs-6">
      <label for="strClientEmailAdress">Email Address</label>
      {!! Form::text('strClientEmailAdress', null, ["class" => "form-control"]) !!}
    </div>
      <div class="col-xs-6">
      <label for="strClientTIN">TIN</label>
      {!! Form::text('strClientTIN', null, ["class" => "form-control"]) !!}
    </div>
  </div>

  <div class="form-group">
  	<a href="{{ route('client.index') }}" class="btn btn-default">Cancel, Return to Client List</a>
  	{!! Form::submit('Update Client Details', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}