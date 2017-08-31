<div class="modal fade" id="add_bprice" role="document">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="base-price-modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form id="formBPrice">
          <div class="form-group">
            <label>Item Model</label>
            <select name="intP_Item_ID" id="intP_Item_ID" class="form-control">
              @foreach ($items as $item)
                <option value="{{$item->intItemID}}">{{ $item->strItemModel }}</option>
              @endforeach
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="txtBasePriceDesc">Amount</label>
            <input type="number" name="decPriceAmount" id="decPriceAmount" min="01.00" class="form-control">
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

<div class="modal fade" id="del_price">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="price-price-del-modal-header">
        <center><h4 id="title">Delete Base Price Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Base Price data and all its contents. 
              <br>
              This action cannot be undone. Delete Base Price?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Base Price</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>