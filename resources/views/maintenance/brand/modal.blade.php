<div class="modal fade" id="add_brand" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="brand-modal-header">
        <h4 id="title">Add New Brand</h4>
      </div>
      <div class="modal-body">
        <form id="formBrand">
          <div class="form-group">
            <label for="strBrandName">Brand Name</label>
            <input type="text" id="strBrandName" name="strBrandName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtBrandDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtBrandDesc"></textarea>
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
