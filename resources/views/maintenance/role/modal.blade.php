<div class="modal fade" id="add_role" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="role-modal-header">
        <h4 id="title">Add New Role</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/role', 'method' => 'POST', 'id' => 'formRole']) !!}
          <div class="form-group">
            {!! Form::label('strRoleName', 'Role') !!}
            {!! Form::text('strRoleName', null, ['id' => 'strRoleName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('txtRoleDesc', 'Description') !!}
            {!! Form::textarea('txtRoleDesc', null, ['id' => 'txtRoleDesc', 'class' => 'form-control resize', 'rows' => '5']) !!}
          </div>
        {!! Form::close() !!}
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="role-del-modal-header">
        <center><h4 id="title">Delete Role Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Role data and all its contents. 
              <br>
              This action cannot be undone. Delete Role?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Role</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>