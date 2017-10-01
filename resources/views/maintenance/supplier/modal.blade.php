<div class="modal fade" id="add_supp" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="supp-modal-header">
        <h4 id="title">Add New Supplier Record</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/supplier', 'method' => 'POST', 'id' => 'formSupp']) !!}
          <div class="form-group">
            {!! Form::label('strSuppName', 'Supplier Name') !!}
            {!! Form::text('strSuppName', null, ['id' => 'strSuppName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="col-xs-6 m-t-10">
            {!! Form::label('strSuppAddLotNo', 'Lot Number') !!}
            {!! Form::text('strSuppAddLotNo', null, ['id' => 'strSuppAddLotNo', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="col-xs-6 m-t-10">
            {!! Form::label('strSuppAddStBldg', 'Street or Building Name') !!}
            {!! Form::text('strSuppAddStBldg', null, ['id' => 'strSuppAddStBldg', 'class' => 'form-control']) !!}
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

<div class="modal fade" id="edit_supp" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="supp-modal-header-info">
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

<div class="modal fade" id="del_supp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="supp-del-modal-header">
        <center><h4 id="title">Delete Supplier Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Supplier data and all its contents. 
              <br>
              This action cannot be undone. Delete Supplier Record?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Record</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Supplier Record</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>