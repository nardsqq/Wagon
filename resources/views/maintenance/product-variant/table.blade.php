<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Supplier</th>
      <th>Brand</th>
      <th>Product</th>
      <th>Model</th>
      <th>Re-Stock Level</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prodvar-list">
    @foreach ($variants as $variant)
      <tr id="id{{ $variant->intProdID }}">
        <td>{{ $variant->supps->strSuppName }}</td>
        <td>{{ $variant->brands->strBrandName }}</td>
        <td>{{ $variant->products->strProdName }}</td>
        <td>{{ $variant->strVarModel }}</td>
        <td>{{ $variant->intVarReStockLevel }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $variant->intVarID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $variant->intVarID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
