<div class="modal fade" id="add_warehouse" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="warehouse-modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <center><h4 id="title">Add New Warehouse</h4></center>
      </div>
      <div class="modal-body">
        <form id="formWarehouse" method="POST" enctype="multipart/form-data" v-on:submit.prevent="createWarehouse">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="strWarehouseName">Warehouse Name</label>
            <input type="text" id="strWarehouseName" name="strWarehouseName" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" required>
          </div>
          <div class="form-group">
            <label for="txtWarehouseLocation">Location</label>
            <textarea class="form-control resize" rows="5" id="txtWarehouseLocation"></textarea>
          </div>
          <div class="form-group">
            <label for="txtWarehouseDesc">Description</label>
            <textarea class="form-control resize" rows="5" id="txtWarehouseDesc"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btn-edit" style="display: none;" value="update" class="btn btn-info btn-block">Update</button>
        <button id="btn-save" value="add" class="btn btn-success btn-block">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>
