<div class="modal fade" id="add_prodvar" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="prodvar-modal-header">
        <h4 id="title">Add New Product Variant</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/maintenance/product-variant', 'method' => 'POST', 'id' => 'formProdVar']) !!}
          <div class="form-group">
            {!! Form::label('intV_Supp_ID', 'Supplier') !!}
            <select name="intV_Supp_ID" id="intV_Supp_ID" class="form-control">
              @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->intSuppID }}">{{ $supplier->strSuppName }}</option>
              @endforeach
            </select>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('intV_Brand_ID', 'Brand') !!}
              <select name="intV_Brand_ID" id="intV_Brand_ID" class="form-control">
                @foreach ($brands as $brand)
                  <option value="{{ $brand->intBrandID }}">{{ $brand->strBrandName }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-6">
              {!! Form::label('intV_Prod_ID', 'Product') !!}
              <select name="intV_Prod_ID" id="intV_Prod_ID" class="form-control">
                @foreach ($products as $product)
                  <option value="{{ $product->intProdID }}">{{ $product->strProdName }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('strVarModel', 'Product Model') !!}
              {!! Form::text('strVarModel', null, ['id' => 'strVarModel', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('strVarHandle', 'Handle') !!}
              {!! Form::text('strVarHandle', null, ['id' => 'strVarHandle', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            <label for="intVarReStockLevel">Stock Re-Order Level</label>
            <input type="number" id="intVarReStockLevel" name="intVarReStockLevel" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45"  min="01.00" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('txtVarDesc', 'Description') !!}
            {!! Form::textarea('txtVarDesc', null, ['id' => 'txtVarDesc', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="edit_prodvar" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-info" id="prodvar-modal-header">
        <h4 id="title">Edit Product Variant</h4>
      </div>
      <div class="modal-body">
        <form id="formEditVar">
          <div class="form-group">
            {!! Form::label('intV_Supp_ID', 'Supplier') !!}
            <select name="intV_Supp_ID" id="intV_Supp_ID" class="form-control">
              @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->intSuppID }}">{{ $supplier->strSuppName }}</option>
              @endforeach
            </select>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('intV_Brand_ID', 'Brand') !!}
              <select name="intV_Brand_ID" id="intV_Brand_ID" class="form-control">
                @foreach ($brands as $brand)
                  <option value="{{ $brand->intBrandID }}">{{ $brand->strBrandName }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-6">
              {!! Form::label('intV_Prod_ID', 'Product') !!}
              <select name="intV_Prod_ID" id="intV_Prod_ID" class="form-control">
                @foreach ($products as $product)
                  <option value="{{ $product->intProdID }}">{{ $product->strProdName }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row m-t-10">
            <div class="col-xs-6">
              {!! Form::label('strVarModel', 'Product Model') !!}
              {!! Form::text('strVarModel', null, ['id' => 'strVarModel', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('strVarHandle', 'Handle') !!}
              {!! Form::text('strVarHandle', null, ['id' => 'strVarHandle', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            <label for="intVarReStockLevel">Stock Re-Order Level</label>
            <input type="number" id="intVarReStockLevel" name="intVarReStockLevel" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45"  min="01.00" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('txtVarDesc', 'Description') !!}
            {!! Form::textarea('txtVarDesc', null, ['id' => 'txtVarDesc', 'class' => 'form-control resize', 'rows' => '5']) !!}
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

<div class="modal fade" id="del_prodvar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="prodvar-del-modal-header">
        <center><h4 id="title">Delete Product Variant Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Product Variant record and all its contents. 
              <br>
              This action cannot be undone. Delete Product Variant?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Record</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Product Variant</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>