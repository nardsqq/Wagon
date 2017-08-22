<div class="modal fade" id="add_product" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="product-modal-header">
        <h4 id="title">Add New Product</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['id' => 'formProduct'])}}
          <div class="row">
            <div class="col-xs-6">
              <label>Product Category</label>
              <select name="intProdProdCateID" id="intProdProdCateID" class="form-control">
                @foreach ($prodcategs as $prodcateg)
                  <option value="{{$prodcateg->intProdCategID}}">{{ $prodcateg->strProdCategName }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-6">
              <label for="strProdName">Product Name</label>
              {{ Form::text('strProdName', "", ['class' => 'form-control'])}}
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              <label for="strProdHandle">Product Handle</label>
              <input type="text" id="strProdHandle" name="strProdHandle" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              <label for="strProdSKU">Stock Keeping Unit</label>
              <input type="text" id="strProdSKU" name="strProdSKU" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label for="txtProdDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtProdDesc" name="txtProdDesc"></textarea>
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

<div class="modal fade" id="del_product">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="product-del-modal-header">
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