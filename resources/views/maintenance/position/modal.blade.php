<div class="modal fade" id="add_position" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="position-modal-header">
        <h4 id="title">Add New Position</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/position', 'method' => 'POST', 'id' => 'formPosition']) !!}
          <div class="form-group">
            {!! Form::label('str_position_name', 'Position') !!}
            {!! Form::text('str_position_name', null, ['id' => 'str_position_name', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('txt_position_desc', 'Description') !!}
            {!! Form::textarea('txt_position_desc', null, ['id' => 'txt_position_desc', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="del_position">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="position-del-modal-header">
        <center><h4 id="title">Delete Position Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Position data and all its contents. 
              <br>
              This action cannot be undone. Delete Position?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Position</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>