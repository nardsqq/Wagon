<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Product Type</th>
      <th>Product</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prod-list">
    @foreach ($products as $product)
      <tr id="id{{ $product->intProdID }}">
        <td>{{ $product->prodtypes->strProdTypeName }}</td>
        <td>{{ $product->strProdName }}</td>
        <td>{{ $product->txtProdDesc }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $product->intProdID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $product->intProdID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
