{!! Form::model($product, ['route' => ['product.update', $product->intProdID]]) !!}
  <div class="row">
    <div class="col-xs-6">
      <label>Product Category</label>
      <select name="intP_ProdCateg_ID" id="intP_ProdCateg_ID" class="form-control">
        @foreach ($prodcategs as $prodcateg)
          <option value="{{$prodcateg->intProdCategID}}">{{ $prodcateg->strProdCategName }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-xs-6">
      <label for="strProdName">Product Name</label>
      {{ Form::text('strProdName', "", ['class' => 'form-control'])}}
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-xs-6">
      <label for="strProdHandle">Product Handle</label>
      <input type="text" id="strProdHandle" name="strProdHandle" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-6">
      <label for="strProdSKU">Stock Keeping Unit</label>
      <input type="text" id="strProdSKU" name="strProdSKU" class="form-control">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
  </div>
  <div class="form-group m-t-10">
    <label for="intFeatSetID">Feature Set</label>
    <select name="intFeatSetID[]" id="intFeatSetID" class="form-control attrib-multi" multiple="multiple">
      @foreach($attribs as $attrib)
        <option value="{{ $attrib->intAttribID }}">{{ $attrib->strAttribName }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group m-t-10">
    <label for="txtProdDesc">Description</label>
    <textarea class="form-control resize" rows="5" id="txtProdDesc" name="txtProdDesc"></textarea>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <div class="form-group">
  	<a href="{{ route('product.index') }}" class="btn btn-default">Cancel, Return to Product List</a>
  	{!! Form::submit('Save Product', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}