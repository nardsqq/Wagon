<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Client PO Number</th>
      <th class="text-center">Client Name</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($headers as $so)
    <tr>
      <td>{{ $so->strSalesOrderCPONumber }}</td>
      <td class="text-center">{{ $so->quote->client->str_client_name }}</td>
      <td class="text-center">
        @if($so->intSalesOrderStatus === 1)
        <span class="label label-info"><i class="fa fa-times fa-fw" aria-hidden="true"></i>&nbsp; Pending</span>
        @else
        <span class="label label-success"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp; Complete</span>
        @endif
      </td>
      <td class="text-center">
          <button class="btn btn-info btn-sm btn-detail open-modal"><i class='fa fa-book'></i>&nbsp; View</button>
          <button class="btn btn-danger btn-sm btn-delete"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>