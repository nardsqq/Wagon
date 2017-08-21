<div class="modal fade" id="add_product" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="product-modal-header">
        <h4 id="title">Add New Product</h4>
      </div>
      <div class="modal-body">
        <form id="formProduct">
          <div class="row">
            <div class="col-xs-6">
              <label>Product Category</label>
              <select class="form-control" name="intProdProdCateID" id="intProdProdCateID">
                @foreach($prodcategs as $prodcateg)
                  <option value={{$prodcateg->intProdCategID}}>{{$prodcateg->strProdCategName}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-6">
              <label for="strProdName">Product Name</label>
              <input type="text" id="strProdName" name="strProdName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            <textarea class="form-control resize" rows="5" id="txtProdDesc"></textarea>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>