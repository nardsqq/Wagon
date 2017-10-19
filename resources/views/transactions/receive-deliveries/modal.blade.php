<div class="modal fade" id="add_mode" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Receive Items</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/receive-items', 'method' => 'POST', 'id' => 'formReceive']) !!}
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('dtmAcquisition', 'Date') !!}
              {!! Form::date('dtmAcquisition', \Carbon\Carbon::now()->format('Y-m-d'), array('id' => 'dtmAcquisition', 'class' => 'form-control')); !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('strPONumber', 'PO Reference Number') !!}
              {!! Form::text('strPONumber', null, ['id' => 'strPONumber', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('intS_Supp_ID', 'Mode of Payment') !!}
            <select name="intS_Supp_ID" id="intS_Supp_ID" class="form-control">
              @foreach ($supps as $supp)
                <option value="{{ $supp->intSuppID }}">{{ $supp->strSuppName }}</option>
              @endforeach
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <select name="intS_Var_ID" id="intS_Var_ID" class="form-control">
              @foreach ($vars as $var)
                <option value="{{ $var->intVarID }}">{{ $var->strVarPartNum }} - {{ $var->strVarModel }}</option>
              @endforeach
            </select>
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

<div class="modal fade" id="edit_mode" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="mode-modal-header-info">
        <h4 id="title">Edit Mode Of Payment Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditMode">
          <div class="form-group">
            {!! Form::label('strMODName', 'Mode of Payment') !!}
            {!! Form::text('strMODName', null, ['id' => 'strModName', 'class' => 'form-control']) !!}
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

<div class="modal fade" id="del_mode">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="mode-del-modal-header">
        <center><h4 id="title">Delete Mode Of Payment Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Mode Of Payment data and all its contents. 
              <br>
              This action cannot be undone. Delete Mode Of Payment?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Mode Of Payment</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>