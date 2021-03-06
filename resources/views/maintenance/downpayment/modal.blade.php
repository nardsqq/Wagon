<div class="modal fade" id="add_down" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="disc-modal-header">
        <h4 id="modal-title">Add New Downpayment</h4>
      </div>
      <div class="modal-body">
        <form id="formDown">
          {{--  <div class="form-group">
            <label for="str_down_name">Downpayment Name</label>
            <input type="text" id="str_down_name" name="str_down_name" class="form-control" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>  --}}
          <div class="form-group">
            <label for="int_down_percentage">Rate</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
              <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="int_down_percentage" id="int_down_percentage" required min="1">
              <span class="input-group-addon">%</span>
            </div>
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

<div class="modal fade" id="del_down">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="disc-del-modal-header">
        <center><h4 id="title">Delete Downpayment Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Downpayment data and all its contents. 
              <br>
              This action cannot be undone. Delete Downpayment?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Downpayment</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>