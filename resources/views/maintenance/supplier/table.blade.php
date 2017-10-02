<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Supplier</th>
      <th>Contact Number</th>
      <th>Associate</th>
      <th>Associate Contact</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="mode-list">
    @foreach ($suppliers as $supplier)
    <tr id="id{{ $supplier->intSuppID }}">
        <td>{{ $supplier->strSuppName }}</td>
        <td>{{ $supplier->strSuppContactNum }}</td>
        <td>{{ $supplier->strSuppContactPers }}</td>
        <td>{{ $supplier->strSuppContactPersNum }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $supplier->intSuppID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $supplier->intSuppID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
