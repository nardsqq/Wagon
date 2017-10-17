<div class="modal fade" id="add_stock" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="stock-modal-header">
        <h4 id="title">Add New Personnel Record</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/transactions/stock-control', 'method' => 'POST', 'id' => 'formStock']) !!}
          <div class="form-group">
            {!! Form::label('strEntryType', 'Entry Type') !!}
            <select name="strEntryType" id="strEntryType" class="form-control">
              <option value="Exchange Item">Exchange Item</option>
              <option value="Ordered Product">Ordered Product</option>
            </select>
          </div>
          <div class="row">
            <div class="col-xs-6">
                <label for="strPONumber">Purchase Order Reference</label>
                <input type="text" id="strPONumber" name="strPONumber" class="form-control">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('dtmAcquisition', 'Date of Acquisition') !!}
              {!! Form::date('dtmAcquisition', \Carbon\Carbon::now()->format('Y-m-d'), array('id' => 'dtmAcquisition', 'class' => 'form-control')); !!}
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('intS_Supp_ID', 'Supplier') !!}
            <select name="intS_Supp_ID" id="intS_Supp_ID" class="form-control">
              @foreach($suppliers as $supplier)
                <option value="{{ $supplier->intSuppID }}">{{ $supplier->strSuppName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('intS_Var_ID', 'Product Variant') !!}
            <select name="intS_Var_ID" id="intS_Var_ID" class="form-control">
              @foreach($variants as $variant)
                <option value="{{ $variant->intVarID }}">{{  $variant->brands->strBrandName }} {{ $variant->products->strProdName }} - {{ $variant->strVarModel }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="intQuantity">Quantity</label>
            <input type="number" id="intQuantity" name="intQuantity" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="decInventCost">Inventory Cost</label>
            <input type="number" id="decInventCost" name="decInventCost" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_stock" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="stock-modal-header-info">
        <h4 id="title">Edit Stock Record</h4>
      </div>
      <div class="modal-body">
        <form id="formEditStock">
          <div class="form-group">
            {!! Form::label('strEntryType', 'Entry Type') !!}
            <select name="strEntryType" id="strEntryType" class="form-control">
              <option value="Exchange Item">Exchange Item</option>
              <option value="Ordered Product">Ordered Product</option>
            </select>
          </div>
          <div class="row">
            <div class="col-xs-6">
                <label for="strPONumber">Purchase Order Reference</label>
                <input type="text" id="strPONumber" name="strPONumber" class="form-control">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('dtmAcquisition', 'Date of Acquisition') !!}
              {!! Form::date('dtmAcquisition', \Carbon\Carbon::now()->format('Y-m-d'), array('id' => 'dtmAcquisition', 'class' => 'form-control')); !!}
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('intS_Supp_ID', 'Supplier') !!}
            <select name="intS_Supp_ID" id="intS_Supp_ID" class="form-control">
              @foreach($suppliers as $supplier)
                <option value="{{ $supplier->intSuppID }}">{{ $supplier->strSuppName }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {!! Form::label('intS_Var_ID', 'Product Variant') !!}
            <select name="intS_Var_ID" id="intS_Var_ID" class="form-control">
              @foreach($variants as $variant)
                <option value="{{ $variant->intVarID }}">{{  $variant->brands->strBrandName }} {{ $variant->products->strProdName }} - {{ $variant->strVarModel }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="intQuantity">Quantity</label>
            <input type="number" id="intQuantity" name="intQuantity" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="decInventCost">Inventory Cost</label>
            <input type="number" id="decInventCost" name="decInventCost" class="form-control">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-update" value="update" class="modal-btn btn btn-info pull-right">Update</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="del_stock">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="stock-del-modal-header">
        <center><h4 id="title">Delete Personnel Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Personnel data and all its contents. 
              <br>
              This action cannot be undone. Delete Personnel Record?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Personnel</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>