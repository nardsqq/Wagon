{!! Form::model($client, ['route' => ['client.update', $client->intClientID], 'method' => 'PUT']) !!}
    
    <div class="form-group">
      <label for="strClientName">Client Name</label>
       {!! Form::text('strClientName', null, ['class' => 'form-control']) !!}
    </div>
    <div class="row m-t-10">
      <div class="col-xs-4">
        <label for="strClientAddLotNum">Lot Number</label>
        {!! Form::text('strClientAddLotNum', null, ['class' => 'form-control', 'placeholder' => 'House or Unit Number']) !!}
      </div>
      <div class="col-xs-4">
        <label for="strClientAddStreet">Street</label>
        {!! Form::text('strClientAddStreet', null, ['class' => 'form-control', 'placeholder' => 'House/Building/Street Number, Street Name']) !!}
      </div>
      <div class="col-xs-4">
        <label for="strClientAddBrgy">District or Baranggay</label>
        {!! Form::text('strClientAddBrgy', null, ['class' => 'form-control', 'placeholder' => 'Barangay or District Name']) !!}
      </div>
    </div>
    <div class="row m-t-10">
      <div class="col-xs-6">
        <label for="strClientAddCity">City</label>
        {!! Form::text('strClientAddCity', null, ['class' => 'form-control', 'placeholder' => 'City or Municipality']) !!}
      </div>
      <div class="col-xs-6">
        <label for="strClientAddProv">Province</label>
        {!! Form::text('strClientAddProv', null, ['class' => 'form-control', 'placeholder' => 'Province or Metro Manila']) !!}
      </div>
    </div>
    <div class="row m-t-10">
      <div class="col-xs-6">
        <label for="strClientTelephone">Telephone</label>
        {!! Form::text('strClientTelephone', null, ['class' => 'form-control', 'placeholder' => '000-0000']) !!}
      </div>
      <div class="col-xs-6">
        <label for="strClientFax">Fax</label>
        {!! Form::text('strClientFax', null, ['class' => 'form-control']) !!}
      </div>
    </div>
    <div class="row m-t-10">
      <div class="col-xs-4">
        <label for="strClientMobile">Mobile</label>
        {!! Form::text('strClientMobile', null, ['class' => 'form-control']) !!}
      </div>
      <div class="col-xs-4">
        <label for="strClientEmailAddress">Email Address</label>
        {!! Form::email('strClientEmailAddress', null, ['class' => 'form-control', 'placeholder' => 'sample@email.com']) !!}
      </div>
      <div class="col-xs-4">
        <label for="strClientTIN">TIN</label>
        {!! Form::text('strClientTIN', null, ['class' => 'form-control']) !!}
      </div>
    </div>
    <hr>
  <div class="form-group">
    <a href="{{ route('client.index') }}" class="btn btn-default">Cancel, Return to Client List</a>
    {!! Form::submit('Save Client Record', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}