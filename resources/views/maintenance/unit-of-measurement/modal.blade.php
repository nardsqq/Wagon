<div class="modal fade" id="add_uom" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="uom-modal-header">
        <h4 id="title">Add New Unit of Measurement</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/unit-of-measurement', 'method' => 'POST', 'id' => 'formUOM']) !!}
          <div class="form-group">
            {!! Form::label('strUOMUnit', 'Unit') !!}
            {!! Form::text('strUOMUnit', null, ['id' => 'strUOMUnit', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strUOMUnitName', 'Description') !!}
            {!! Form::text('strUOMUnitName', null, ['id' => 'strUOMUnitName', 'class' => 'form-control']) !!}
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

<div class="modal fade" id="edit_uom" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="uom-modal-header-info">
        <h4 id="title">Edit Unit of Measurement Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditUOM">
          <div class="form-group">
            {!! Form::label('strUOMUnit', 'Unit') !!}
            {!! Form::text('strUOMUnit', null, ['id' => 'strUOMUnit', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('strUOMUnitName', 'Description') !!}
            {!! Form::text('strUOMUnitName', null, ['id' => 'strUOMUnitName', 'class' => 'form-control']) !!}
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

<div class="modal fade" id="del_uom">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="uom-del-modal-header">
        <center><h4 id="title">Delete Unit of Measurement Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Unit of Measurement data and all its contents. 
              <br>
              This action cannot be undone. Delete Unit of Measurement?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Unit of Measurement</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>