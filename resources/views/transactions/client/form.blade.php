{{ Form::open(array('route' => 'client.store'))}}
  <div class="row">
    
    <div class="col-xs-12">
      <label for="strClientName">Client Name</label>
      <input type="text" id="strClientName" name="strClientName" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientAddLotNum">Lot Number</label>
      <input type="text" id="strClientAddLotNum" name="strClientAddLotNum" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientAddStreet">Street</label>
      <input type="text" id="strClientAddStreet" name="strClientAddStreet" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientAddBrgy">Brgy</label>
      <input type="text" id="strClientAddBrgy" name="strClientAddBrgy" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientAddCity">City</label>
      <input type="text" id="strClientAddCity" name="strClientAddCity" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientAddProv">Province</label>
      <input type="text" id="strClientAddProv" name="strClientAddProv" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientTelephone">Telephone</label>
      <input type="text" id="strClientTelephone" name="strClientTelephone" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientFax">Fax</label>
      <input type="text" id="strClientFax" name="strClientFax" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientMobile">Mobile</label>
      <input type="text" id="strClientMobile" name="strClientMobile" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientEmailAddress">Email Address</label>
      <input type="text" id="strClientEmailAddress" name="strClientEmailAddress" class="form-control">
    </div>
    <div class="col-xs-6">
      <label for="strClientTIN">TIN</label>
      <input type="text" id="strClientTIN" name="strClientTIN" class="form-control">
    </div>
    

  </div>
 
 
  <div class="form-group">
  	<a href="{{ route('client.index') }}" class="btn btn-default">Cancel, Return to Client List</a>
  	{!! Form::submit('Save Client', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}