<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Category</th>
      <th>Product Type</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prodtype-list">
    @foreach ($prodtypes as $prodtype)
    <tr id="id{{$prodtype->intProdTypeID}}">
        <td>{{ $prodtype->strProdCateg }}</td>
        <td>{{ $prodtype->strProdTypeName }}</td>
        <td>{{ $prodtype->txtProdTypeDesc }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $prodtype->intProdTypeID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $prodtype->intProdTypeID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
