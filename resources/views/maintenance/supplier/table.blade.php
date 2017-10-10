<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Supplier</th>
      <th class="text-center">Contact Number</th>
      <th class="text-center">Associate</th>
      <th class="text-center">Associate Contact</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="mode-list">
    @foreach ($suppliers as $supplier)
    <tr id="id{{ $supplier->intSuppID }}">
        <td>{{ $supplier->strSuppName }}</td>
        <td class="text-center">{{ $supplier->strSuppContactNum }}</td>
        <td class="text-center">{{ $supplier->strSuppContactPers }}</td>
        <td class="text-center">{{ $supplier->strSuppContactPersNum }}</td>
        <td class="text-center">
            <a href="{{ route('supplier.show', $supplier->intSuppID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $supplier->intSuppID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $supplier->intSuppID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
