<div class="modal fade" id="add_prodstatus">
  <div class="modal-dialog pulse animated">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button class="close" data-dismiss="modal">&times;</button>
        <center><h4>Product Inventory Status</h4></center>
      </div>
      <div class="modal-body">
        <form id="formProductInventStatus" data-parsley-validate>
          <div class="form-group">
            <label for="strProdInventoryStatusName">Inventory Status</label>
            <input type="text" id="strProdInventoryStatusName" name="strProdInventoryStatusName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
            <label for="strDesc">Product Inventory Status Details</label>
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