<div class="modal fade" id="add_productcategory">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4>Add Product Category</h4>
      </div>
      <div class="modal-body">
        <form id="formProductCategory" data-parsley-validate>
          <div class="form-group">
            <label for="strProductCategoryName">Product Category</label>
            <input type="text" id="strProductCategoryName" name="strProductCategoryName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strDesc">Product Category Details</label>
            <input type="text" id="strDesc" name="strDesc" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="25">
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