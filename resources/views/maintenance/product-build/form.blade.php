{{ Form::open(array('route' => 'product-build.store'))}}
  <div class="row">
    <div class="col-xs-6">
      <label>Product</label>
      <select name="intI_Prod_ID" id="intI_Prod_ID" class="form-control">
        @foreach ($products as $product)
          <option value="{{$product->intProdID}}">{{ $product->strProdName }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-xs-6">
      <label>Brand</label>
      <select name="intI_Brand_ID" id="intI_Brand_ID" class="form-control">
        @foreach ($brands as $brand)
          <option value="{{$brand->intBrandID}}">{{ $brand->strBrandName }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-xs-4">
      <label for="strItemModel">Model</label>
      <input type="text" id="strItemModel" name="strItemModel" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-4">
      <label for="strItemHandle">Handle</label>
      <input type="text" id="strProdSKU" name="strItemHandle" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-4">
      <label for="intItemLevel">Stock Threshold</label>
      <input type="number" id="intItemLevel" name="intItemLevel" class="form-control" min="1">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
  </div>
  <div class="form-group m-t-10">
    <label for="txtItemDesc">Product Build Remarks</label>
    <textarea class="form-control resize" rows="5" id="txtItemDesc" name="txtItemDesc"></textarea>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <hr>
  <div class="form-group">
  	<a href="{{ route('product-build.index') }}" class="btn btn-default">Cancel, Return to Build List</a>
  	{!! Form::submit('Save Product Build', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}