<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th class="text-center">Brand</th>
      <th class="text-center">Product</th>
      <th class="text-center">Model</th>
      <th class="text-center">Re-Stock Level</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prodvar-list">
    @foreach ($variants as $variant)
      <tr id="id{{ $variant->intVarID }}">
        <td class="text-center">{{ $variant->brands->strBrandName }}</td>
        <td class="text-center">{{ $variant->products->strProdName }}</td>
        <td class="text-center">{{ $variant->strVarModel }}</td>
        <td class="text-center">{{ $variant->intVarReStockLevel }}</td>
        <td class="text-center">
            <a href="{{ route('product-variant.show', $variant->intVarID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $variant->intVarID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $variant->intVarID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
