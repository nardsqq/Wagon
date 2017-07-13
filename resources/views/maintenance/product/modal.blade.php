<div class="modal fade" id="add_product">
  <div class="modal-dialog pulse animated">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button class="close" data-dismiss="modal">&times;</button>
        <center><h4>Add Product</h4></center>
      </div>
      <div class="modal-body">
        <form id="formProduct" data-parsley-validate>
          <div class="form-group">
            <label>Product Category</label>
            <select id="intProductCategory" class="form-control" name="intProductCategory">
              @foreach($productcategory as $productcategories)
                <option value={{$productcategories->intProductCategoryID}}>{{$productcategories->strProductCategoryName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="strProductName">Product</label>
            <input type="text" id="strProductName" name="strProductName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strDesc">Serial Number</label>
            <input type="text" id="strProductSerialNumber" name="strProductSerialNumber" data-parsley-pattern="[.,--&\\'a-zA-Z0-9\s]+" class="form-control" maxlength="45">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <button id="btn-save" value="add" class="btn btn-success btn-block">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>