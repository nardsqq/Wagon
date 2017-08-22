<div class="modal fade" id="add_servtype" role="document">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="service-type-modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form id="formServType">
          <div class="form-group">
            <label for="strServTypeName">Service Type</label>
            <input type="text" id="strServTypeName" name="strServTypeName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtServTypeDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtServTypeDesc"></textarea>
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

<div class="modal fade" id="del_servtype">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="service-type-del-modal-header">
        <center><h4 id="title">Delete Service Type Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Service Type data and all its contents. 
              <br>
              This action cannot be undone. Delete Service Type?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Service Type</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>