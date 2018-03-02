<div class="modal fade" id="add_pers" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="pers-modal-header">
        <h4 id="title">Add New Personnel Record</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/personnel', 'method' => 'POST', 'id' => 'formPers']) !!}
          <div class="form-group">
            {!! Form::label('str_personnel_type', 'Personnel Type') !!}
            <select name="str_personnel_type" id="str_personnel_type" class="form-control">
              <option value="Contractual">Contractual</option>
              <option value="Regular">Regular</option>
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('str_personnel_f_name', 'First Name') !!}
            {!! Form::text('str_personnel_f_name', null, ['id' => 'str_personnel_f_name', 'class' => 'form-control', 'required' => 'true']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('str_personnel_m_name', 'Middle Name') !!}
            {!! Form::text('str_personnel_m_name', null, ['id' => 'str_personnel_m_name', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('str_personnel_l_name', 'Last Name') !!}
            {!! Form::text('str_personnel_l_name', null, ['id' => 'str_personnel_l_name', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('str_personnel_mobile_num', 'Mobile Number') !!}
            {!! Form::text('str_personnel_mobile_num', null, ['id' => 'str_personnel_mobile_num', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('txt_personnel_address', 'Address') !!}
            <textarea name="txt_personnel_address" id="txt_personnel_address" cols="30" rows="10" class="form-control"></textarea>
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

<div class="modal fade" id="edit_pers" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="pers-modal-header-info">
        <h4 id="title">Edit Personnel Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditPers">
          {{-- <div class="row">
            <div class="col-xs-6">
              {!! Form::label('intPers_Role_ID', 'Role') !!}
              <select name="intPers_Role_ID" id="intPers_Role_ID" class="form-control">
                @foreach($roles as $role)
                  <option value="{{ $role->intRoleID }}">{{ $role->strRoleName }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-6">
              {!! Form::label('strPersEmpType', 'Employee Type') !!}
              <select name="strPersEmpType" id="strPersEmpType" class="form-control">
                <option value="Regular">Regular</option>
                <option value="Contractual">Contractual</option>
              </select>
            </div>
          </div> --}}
          <div class="form-group m-t-10">
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
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-update" value="update" class="modal-btn btn btn-info pull-right">Update</button>
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