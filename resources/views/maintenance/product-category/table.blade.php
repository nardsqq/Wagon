<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Product Category</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="prodcateg-list">
    @foreach ($prodcategs as $prodcateg)
    <tr id="id{{$prodcateg->intProdCategID}}">
        <td>{{ $prodcateg->strProdCategName }}</td>
        <td>{{ $prodcateg->txtProdCategDesc }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $prodcateg->intProdCategID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $prodcateg->intProdCategID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
