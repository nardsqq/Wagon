<div class="modal fade" id="add_prod" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="prod-modal-header">
        <h4 id="title">Add New Product</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/product', 'method' => 'POST', 'id' => 'formProd']) !!}
          <div class="form-group">
            {!! Form::label('str_product_name', 'Product Name') !!}
            {!! Form::text('str_product_name', null, ['id' => 'str_product_name', 'class' => 'form-control']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            {!! Form::label('str_attrib_name', 'Attributes') !!}
            {!! Form::select('str_attrib_name[]', [], null, ['id' => 'str_attrib_name', 'class' => 'form-control', 'aria-describedby' => 'helpBlock']) !!}
            <span id="helpBlock" class="help-block">(e.g. Color, Size, Speed...)</span>
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

<div class="modal fade" id="del_prod">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="prod-del-modal-header">
        <center><h4 id="title">Delete Product Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Product data and all its contents. 
              <br>
              This action cannot be undone. Delete Product?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Product</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>