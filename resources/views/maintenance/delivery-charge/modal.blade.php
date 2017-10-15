<div class="modal fade" id="add_delchar" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="delchar-modal-header">
        <h4 id="title">Add New Delivery Charge</h4>
      </div>
      <div class="modal-body">
        <form id="formDelChar">
          <div class="form-group">
            <label for="strDelCharName">Location</label>
            <input type="text" id="strDelCharName" name="strDelCharName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="decDelCharRate">Rate</label>
            <input type="number" id="decDelCharRate" name="decDelCharRate" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" step="00.01" min="00.01" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="del_delchar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="delchar-del-modal-header">
        <center><h4 id="title">Delete Delivery Charge Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Delivery Charge data and all its contents. 
              <br>
              This action cannot be undone. Delete Delivery Charge?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Delivery Charge</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>