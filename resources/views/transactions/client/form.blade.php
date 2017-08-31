{{ Form::open(array('route' => 'client.store'))}}
    
    <div class="form-group">
      <label for="strClientName">Client Name</label>
      <input type="text" id="strClientName" name="strClientName" class="form-control">
    </div>
    <div class="row m-t-10">
      <div class="col-xs-4">
        <label for="strClientAddLotNum">Lot Number</label>
        <input type="text" id="strClientAddLotNum" name="strClientAddLotNum" class="form-control" placeholder="House or Unit Number">
      </div>
      <div class="col-xs-4">
        <label for="strClientAddStreet">Street</label>
        <input type="text" id="strClientAddStreet" name="strClientAddStreet" class="form-control" placeholder="House/Building/Street Number, Street Name">
      </div>
      <div class="col-xs-4">
        <label for="strClientAddBrgy">District or Baranggay</label>
        <input type="text" id="strClientAddBrgy" name="strClientAddBrgy" class="form-control" placeholder="Barangay or District Name">
      </div>
    </div>
    <div class="row m-t-10">
      <div class="col-xs-6">
        <label for="strClientAddCity">City</label>
        <input type="text" id="strClientAddCity" name="strClientAddCity" class="form-control" placeholder="City or Municipality">
      </div>
      <div class="col-xs-6">
        <label for="strClientAddProv">Province</label>
        <input type="text" id="strClientAddProv" name="strClientAddProv" class="form-control" placeholder="Province or Metro Manila">
      </div>
    </div>
    <div class="row m-t-10">
      <div class="col-xs-6">
        <label for="strClientTelephone">Telephone</label>
        <input type="text" id="strClientTelephone" name="strClientTelephone" class="form-control" placeholder="000-0000">
      </div>
      <div class="col-xs-6">
        <label for="strClientFax">Fax</label>
        <input type="text" id="strClientFax" name="strClientFax" class="form-control" >
      </div>
    </div>
    <div class="row m-t-10">
      <div class="col-xs-4">
        <label for="strClientMobile">Mobile</label>
        <input type="text" id="strClientMobile" name="strClientMobile" class="form-control" placeholder="">
      </div>
      <div class="col-xs-4">
        <label for="strClientEmailAddress">Email Address</label>
        <input type="email" id="strClientEmailAddress" name="strClientEmailAddress" class="form-control" placeholder="sample@email.com">
      </div>
      <div class="col-xs-4">
        <label for="strClientTIN">TIN</label>
        <input type="text" id="strClientTIN" name="strClientTIN" class="form-control">
      </div>
    </div>
    <hr>
  <div class="form-group">
  	<a href="{{ route('client.index') }}" class="btn btn-default">Cancel, Return to Client List</a>
  	{!! Form::submit('Save Client Record', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}