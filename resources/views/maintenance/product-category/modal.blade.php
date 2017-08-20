<div class="modal fade" id="add_prodcateg" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="prodcateg-modal-header">
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

<div class="modal fade" id="del_prodcateg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="prodcateg-del-modal-header">
        <h4 id="title">Delete Product Category Record</h4>
      </div>
      <div class="modal-body">
        <h4><b>Warning, you are about to delete a warehouse data and all its contents. This action cannot be undone. Delete <i id="prodcategdel">Product Category</i> ?</b></h4>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Data</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>