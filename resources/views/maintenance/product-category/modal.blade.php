<div class="modal fade" id="add_prodcateg" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="brand-modal-header">
        <h4 id="title">Add New Product Category</h4>
      </div>
      <div class="modal-body">
        <form id="formProdCateg">
          <div class="form-group">
            <label for="strProdCategName">Category Name</label>
            <input type="text" id="strProdCategName" name="strProdCategName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtProdCategDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtProdCategDesc"></textarea>
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
