<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>PO Number</th>
      <th class="text-center">Client Name</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>7624598312</td>
      <td class="text-center">Taiyo Incorporated</td>
      <td class="text-center">
        {{-- @if($so->intSalesOrderStatus === 1) --}}
        <span class="label label-info"><i class="fa fa-times fa-fw" aria-hidden="true"></i>&nbsp; Pending</span>
        {{-- @else --}}
        {{-- <span class="label label-success"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp; Complete</span> --}}
        {{-- @endif --}}
      </td>
      <td class="text-center">
          <button class="btn btn-info btn-sm btn-detail open-modal"><i class='fa fa-book'></i>&nbsp; View</button>
          <button class="btn btn-danger btn-sm btn-delete"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
  </tbody>
</table>