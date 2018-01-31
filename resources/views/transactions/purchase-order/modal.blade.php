<div class="modal fade" id="add_po" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="po-modal-header">
        <h4 id="title">Process New Order</h4>
      </div>
      <div class="modal-body">
        <form id="formPurchaseOrder">
          <div class="row m-t-10">
            <div class="col-xs-6">
              <label for="po_number">Required Date</label>
              <input type="date" name="po_date" id="po_date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              <label for="po_date">Promised Date</label>
              <input type="date" name="po_date" id="po_date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              <label for="po_number">Order Reference</label>
              <input type="text" id="po_number" name="po_number" class="form-control">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              <label for="po_date">Order Created Date</label>
              <input type="date" name="po_date" id="po_date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" disabled>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            <label for="po_client">Ordered By</label>
            <select name="po_client" id="po_client" class="form-control">
              <option>Taiyo Incorporated</option>
              <option>Taitech Marine</option>
            </select>
          </div>
          <div class="form-group">
            <label for="proj_location">Delivery Address</label>
            <textarea class="resize form-control" rows="3"></textarea>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              <label for="mode_payment">Delivery Contact Person</label>
              <input type="text" id="po_number" name="po_number" class="form-control">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              <label for="po_date">Delivery Contact Number</label>
              <input type="text" id="po_number" name="po_number" class="form-control">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label>Products</label>
            <button id="btn-add-step" type="button" class="btn btn-sm btn-success pull-right">Add Product</button>
            <select name="service" id="service" class="form-control m-t-10">
              <option>Ship Insight Marine Lubricant 00T1</option>
              <option>General Electric LM2500 Gas Turbine</option>
            </select>
          </div>
          <div class="form-group">
            <label>Services</label>
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