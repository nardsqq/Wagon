<div class="modal fade" id="add_mode" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Add New Mode Of Payment</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/mode-of-payment', 'method' => 'POST', 'id' => 'formMode']) !!}
          <div class="form-group">
            {!! Form::label('strMODName', 'Mode of Payment') !!}
            {!! Form::text('strMODName', null, ['id' => 'strModName', 'class' => 'form-control']) !!}
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