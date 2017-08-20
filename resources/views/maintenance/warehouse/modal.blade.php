<div class="modal fade" id="add_warehouse" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="warehouse-modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <center><h4 id="title">Add New Warehouse</h4></center>
      </div>
      <div class="modal-body">
        <form id="formWarehouse">
          <div class="form-group">
            <label for="strWarehouseName">Warehouse Name</label>
            <input type="text" id="strWarehouseName" name="strWarehouseName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtWarehouseLocation">Location</label>
            <textarea class="form-control resize" rows="5" id="txtWarehouseLocation"></textarea>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtWarehouseDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtWarehouseDesc"></textarea>
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

<div class="modal fade" id="del_warehouse">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="warehouse-del-modal-header">
        <h4 id="title">Delete Warehouse Record</h4>
      </div>
      <div class="modal-body">
        <h4><b>Warning, you are about to delete a warehouse data and all its contents. This action cannot be undone. Delete <i id="warehousedel">Warehouse</i> ?</b></h4>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Data</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>