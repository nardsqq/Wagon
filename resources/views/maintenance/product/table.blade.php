<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Category</th>
      <th>Name</th>
      <th>Handle</th>
      <th>SKU</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="product-list">
    @foreach ($products as $product)
    <tr id="id{{$product->intProdID}}">
        <td>{{ $product->prodcateg->strProdCategName }}</td>
        <td>{{ $product->strProdName }}</td>
        <td>{{ $product->strProdHandle }}</td>
        <td>{{ $product->strProdSKU }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $product->intProdID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $product->intProdID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
