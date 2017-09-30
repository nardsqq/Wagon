<div class="modal fade" id="add_pers" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="pers-modal-header">
        <h4 id="title">Add New Personnel Record</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/personnel', 'method' => 'POST', 'id' => 'formPers']) !!}
          <div class="form-group">
            {!! Form::label('intPers_Role_ID', 'Role') !!}
            <select name="intPers_Role_ID" id="intPers_Role_ID" class="form-control">
              @foreach($roles as $role)
                <option value="{{ $role->intRoleID }}">{{ $role->strRoleName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strPersEmpType', 'Employee Type') !!}
            <select name="strPersEmpType" id="strPersEmpType" class="form-control">
              <option value="Regular">Regular</option>
              <option value="Contractual">Contractual</option>
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('strPersFName', 'First Name') !!}
            {!! Form::text('strPersFName', null, ['id' => 'strPersFName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strPersMName', 'Middle Name') !!}
            {!! Form::text('strPersMName', null, ['id' => 'strPersMName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strPersLName', 'Last Name') !!}
            {!! Form::text('strPersLName', null, ['id' => 'strPersLName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strPersMobNo', 'Mobile Number') !!}
            {!! Form::text('strPersMobNo', null, ['id' => 'strPersMobNo', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

<div class="modal fade" id="del_pers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="pers-del-modal-header">
        <center><h4 id="title">Delete Personnel Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Personnel data and all its contents. 
              <br>
              This action cannot be undone. Delete Personnel Record?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Personnel</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>