<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Supplier</th>
      <th class="text-center">Contact Detail</th>
      <th class="text-center">Address</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="mode-list">
    @foreach ($suppliers as $supplier)
    <tr id="id{{ $supplier->int_supplier_id }}">
        <td>{{ $supplier->str_supplier_name }}</td>
        @if ($supplier->str_supplier_mobile_num != null && $supplier->str_supplier_tel_num == null && $supplier->str_supplier_email == null)
          <td class="text-center">{{ $supplier->str_supplier_mobile_num }}</td>
        @else
          <td class="text-center">{{ $supplier->str_supplier_tel_num }}</td>
        @endif
        <td class="text-center">{{ $supplier->txt_supplier_address }}</td>
        <td class="text-center">
            <a href="{{ route('supplier.show', $supplier->int_supplier_id) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $supplier->int_supplier_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $supplier->int_supplier_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
