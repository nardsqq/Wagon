<div class="modal fade" id="add_prodtype" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="prodtype-modal-header">
        <h4 id="title">Add New Mode Of Payment</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/product-type', 'method' => 'POST', 'id' => 'formProdType']) !!}
          <div class="form-group">
            {!! Form::label('strProdTypeName', 'Product Type') !!}
            {!! Form::text('strProdTypeName', null, ['id' => 'strProdTypeName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('txtProdTypeDesc', 'Description') !!}
            {!! Form::textarea('txtProdTypeDesc', null, ['id' => 'txtProdTypeDesc', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="edit_prodtype" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="prodtype-modal-header-info">
        <h4 id="title">Edit Product Type Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditProdType">
          <div class="form-group">
            {!! Form::label('strProdTypeName', 'Product Type') !!}
            {!! Form::text('strProdTypeName', null, ['id' => 'strProdTypeName', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('txtProdTypeDesc', 'Description') !!}
            {!! Form::textarea('txtProdTypeDesc', null, ['id' => 'txtProdTypeDesc', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="del_prodtype">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="prodtype-del-modal-header">
        <center><h4 id="title">Delete Product Type Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Product Type data and all its contents. 
              <br>
              This action cannot be undone. Delete Product Type?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Product Type</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>