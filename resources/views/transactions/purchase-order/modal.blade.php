<div class="modal fade" id="add_po" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="po-modal-header">
        <h4 id="title">Add New Purchase Order</h4>
      </div>
      <div class="modal-body">
        <form id="formPurchaseOrder">
          <div class="row">
            <div class="col-xs-6">
              <label for="po_number">Purchase Order Number</label>
              <input type="text" id="po_number" name="po_number" class="form-control">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              <label for="po_date">Date</label>
              <input type="date" name="po_date" id="po_date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            <label for="po_client">Client</label>
            <select name="po_client" id="po_client" class="form-control">
              <option>Taiyo Incorporated</option>
              <option>Taitech Marine</option>
            </select>
          </div>
          <div class="form-group">
            <label for="proj_location">Project Location</label>
            <input type="text" id="proj_location" name="proj_location" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="mode_payment">Mode of Payment</label>
            <input type="text" id="mode_payment" name="mode_payment" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="discount">Discount</label>
            <input type="text" id="discount" name="discount" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label>Services List</label>
            <button id="btn-add-step" type="button" class="btn btn-sm btn-success pull-right">Add Service</button>
            <select name="service" id="service" class="form-control m-t-10">
              <option>Repair</option>
              <option>Equipment Overhauling</option>
            </select>
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