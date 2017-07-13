<div class="modal fade" id="add_prodinvent">
  <div class="modal-dialog pulse animated">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button class="close" data-dismiss="modal">&times;</button>
        <center><h4>Product Inventory</h4></center>
      </div>
      <div class="modal-body">
        <form id="formProductInventory" data-parsley-validate>
          <div class="form-group">
            <label>Product</label>
            <select id="intProductInventoryProdID" class="form-control" name="intProductInventoryProdID">
              @foreach($prod as $prods)
                <option value={{$prods->intProductID}}>{{$prods->strProductName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select id="intProdInventStatID" class="form-control" name="intProdInventStatID">
              @foreach($prodstat as $prodstats)
                <option value={{$prodstats->intProdInventoryStatusID}}>{{$prodstats->strProdInventoryStatusName}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="strDesc">Quantity</label>
            <input type="text" id="intProductQuantity" name="intProductQuantity" class="form-control" data-parsley-type="number">
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