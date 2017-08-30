{!! Form::model($item, ['route' => ['product-build.update', $item->intItemID], 'method' => 'PUT']) !!}
  <div class="row">
    <div class="col-xs-6">
      <label>Product</label>
      {!! Form::select('intI_Prod_ID', $products, null, ['class' => 'form-control']) !!}﻿
    </div>
    <div class="col-xs-6">
      <label>Brand</label>
      {!! Form::select('intI_Brand_ID', $brands, null, ['class' => 'form-control']) !!}﻿
    </div>
  </div>
  <div class="row m-t-10">
    <div class="col-xs-4">
      <label for="strItemModel">Model</label>
      {!! Form::text('strItemModel', null, ['class' => 'form-control']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-4">
      <label for="strItemHandle">Handle</label>
      {!! Form::text('strItemHandle', null, ['class' => 'form-control']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="col-xs-4">
      <label for="intItemLevel">Stock Threshold</label>
      {!! Form::number('intItemLevel', null, ['class' => 'form-control', 'min' => '1']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
  </div>
  <div class="form-group m-t-10">
    <label for="txtItemDesc">Product Build Remarks</label>
    {!! Form::textarea('txtItemDesc', null, ['class' => 'form-control resize']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <hr>
  <div class="form-group">
  	<a href="{{ route('product-build.index') }}" class="btn btn-default">Cancel, Return to Product Build List</a>
  	{!! Form::submit('Update Product Build', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}