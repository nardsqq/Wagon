<div class="modal fade" id="replenish" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="delchar-modal-header">
        <h4 id="title">Replenish - Product Name</h4>
      </div>
      <div class="modal-body">
        <form id="formDelChar">
          <div class="form-group">
            <label for="ProdCode">Product ID</label>
            <p>PROD00-ARGUS1</p>
          </div>
          <div class="form-group">
            <label for="ProdName">Description</label>
            <p>Argus 1 Propeller - A2E5</p>
          </div>
          <div class="form-group">
            <label for="ProdName">In Stock</label>
            <p>3</p>
          </div>
          <div class="form-group">
            <label for="ProdName">Supplier Name</label>
            <select name="intV_Prod_ID" id="intV_Prod_ID" class="form-control">
                <option>TAIYO Marine Incorporated</option>
                <option>The HMS Group</option>
                <option>ShipServ Manufacturing</option>
              </select>
          </div>
          <div class="form-group">
            <label for="">To Order (Quantity)</label>
            <input type="number" id="decDelCharRate" name="decDelCharRate" class="form-control" step="1" min="1" required>
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

<div class="modal fade" id="adjust" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="delchar-modal-header">
        <h4 id="title">Adjust - Product Name</h4>
      </div>
      <div class="modal-body">
        <form id="formDelChar">
          <div class="form-group">
            <label for="ProdCode">Product ID</label>
            <p>PROD00-ARGUS1</p>
          </div>
          <div class="form-group">
            <label for="ProdName">Description</label>
            <p>Argus 1 Propeller - A2E5</p>
          </div>
          <div class="form-group">
            <label for="ProdName">In Stock</label>
            <p>5</p>
          </div>
          <div class="form-group">
            <label for="">Adjustment (Quantity)</label>
            <input type="number" id="decDelCharRate" name="decDelCharRate" class="form-control" step="1" min="1" required>
          </div>
          <div class="form-group">
            <label for="">Difference (Quantity)</label>
            <input type="text" id="decDelCharRate" name="decDelCharRate" class="form-control" disabled>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-info pull-right">Update</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="details" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="delchar-modal-header">
        <h4 id="title">Product Name Details</h4>
      </div>
      <div class="modal-body">
        <form id="formDelChar">
          <div class="form-group">
            <label for="ProdCode">Product ID</label>
            <p>PROD00-ARGUS1</p>
          </div>
          <div class="form-group">
            <label for="ProdName">Description</label>
            <p>Argus 1 Propeller - A2E5</p>
          </div>
          <div class="form-group">
            <label for="ProdName">In Stock</label>
            <p>5</p>
          </div>
          <div class="form-group">
            <label for="ProdName">Status</label>
            <p><span class="label label-warning" style="border-radius: 0px;">Needs Re-Stock</span></p>
          </div>
          <div class="form-group">
            <label for="ProdName">Supplier</label>
            <p>TAIYO Marine Inc.</p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-block btn-default pull-left" data-dismiss="modal">Close</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>