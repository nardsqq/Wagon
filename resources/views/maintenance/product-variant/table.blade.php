<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th class="text-center">Product</th>
      <th class="text-center">Specifications</th>
      <th class="text-center">Initial Stock</th>
      <th class="text-center">Current Stock</th>
      <th class="text-center">Unit Price</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prodvar-list">
    @foreach ($variants as $variant)
      <tr id="id{{ $variant->int_var_id }}">
        <td class="text-center">{{ $variant->product->str_product_name }}</td>
        <td>
          @foreach($variant->specs->take(5) as $spec)
          <strong>{{ $spec->prod_attrib->attribute->str_attrib_name }}: </strong> {{ $spec->str_spec_constant }}<br>
          @endforeach
          @if($variant->specs->count() > 5)
          {{--  [todo] - display all specs  --}}
          <button class="btn btn-block btn-default">View All Specifications</button>
          @endif
        </td>
        <td class="text-center">{{ $variant->stocks()->first()->int_quantity }}</td>
        <td class="text-center">{{ $variant->stocks()->latest()->first()->int_quantity }}</td>
        <td class="text-center">{{ $variant->prices()->latest()->first()->dbl_price }}</td>
        <td class="text-center">
            {{--  <a href="{{ route('product-variant.show', $variant->int_var_id) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>  --}}
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $variant->int_var_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $variant->int_var_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
