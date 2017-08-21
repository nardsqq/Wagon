<div class="modal fade" id="add_role" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="role-modal-header">
        <h4 id="title">Add New Role</h4>
      </div>
      <div class="modal-body">
        <form id="formRole">
          <div class="form-group">
            <label for="strRoleName">Role</label>
            <input type="text" id="strRoleName" name="strRoleName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtRoleDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtRoleDesc"></textarea>
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

<div class="modal fade" id="del_role">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="role-del-modal-header">
        <center><h4 id="title">Delete Role Record</h4></center>
      </div>
      <div class="modal-body">
        <center><h5><b>You are about to delete a role data and all its contents. This action cannot be undone. Delete Role?</b></h5></center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Role</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>