<div class="modal fade" id="add_client">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4>Client Form</h4>
      </div>
      <div class="modal-body">
        <form id="formClient" data-parsley-validate>
          <div class="form-group">
            <label for="strClientName">Client Name</label>
            <input type="text" id="strClientName" name="strClientName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strClientAddress">Client Address</label>
            <input type="text" id="strClientAddress" name="strClientAddress" class="form-control" minlength="3" maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strClientTelephone">Telephone Number</label>
            <input type="text" id="strClientTelephone" name="strClientTelephone" class="form-control" minlength="3" maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strClientFax">FAX Number</label>
            <input type="text" id="strClientFax" name="strClientFax" class="form-control" minlength="3" maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strClientEmail">Email Address</label>
            <input type="text" id="strClientEmail" name="strClientEmail" class="form-control" minlength="3" maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strClientMobile">Mobile Number</label>
            <input type="text" id="strClientMobile" name="strClientMobile" class="form-control" minlength="3" maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <button id="btn-save" value="add" class="btn btn-success btn-block">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>