{!! Form::model($product, ['route' => ['product.update', $product->intProdID], 'method' => 'PUT']) !!}
  <div class="row">
    <div class="col-xs-6">
      <label>Product Category</label>
      {!! Form::select('intP_ProdCateg_ID', $prodcategs, null, ['class' => 'form-control']) !!}﻿
    </div>
    <div class="col-xs-6">
      <label for="strProdName">Product Name</label>
      {!! Form::text('strProdName', null, ["class" => "form-control"]) !!}
    </div>
  </div>
  <div class="form-group m-t-10">
    <label for="intFeatSetID">Feature Set</label>
    {!! Form::select('intFeatSetID[]', $attribs, null, ['class' => 'form-control attrib-multi', 'multiple' => 'multiple']) !!}
  </div>
  <div class="form-group m-t-10">
    <label for="txtProdDesc">Description</label>
    {!! Form::textarea('txtProdDesc', null, ["class" => "form-control"]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <div class="form-group">
  	<a href="{{ route('product.index') }}" class="btn btn-default">Cancel, Return to Product List</a>
  	{!! Form::submit('Update Product Details', array('class' => 'btn btn-success pull-right')) !!}
  </div>
{!! Form::close() !!}