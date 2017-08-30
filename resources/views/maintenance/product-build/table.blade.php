<table id="dataTable" class="table table-bordered table-hover table-condensed" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Product</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Handle</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="product-list">
    @foreach ($items as $item)
    <tr id="id{{$item->intItemID}}">
        <td>{{ $item->products->strProdName }}</td>
        <td>{{ $item->brands->strBrandName }}</td>
        <td>{{ $item->strItemModel }}</td>
        <td>{{ $item->strItemHandle }}</td>
        <td class="text-center">
            <a href="{{ route('product-build.show', $item->intItemID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <a href="{{ route('product-build.edit', $item->intItemID) }}" class="btn btn-info btn-sm btn-detail"><i class='fa fa-edit'></i>&nbsp; Edit</a>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $item->intItemID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
