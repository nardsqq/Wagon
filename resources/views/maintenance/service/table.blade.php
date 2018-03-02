<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Service</th>
      <th>Service Fee</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="service-area-list">
    @foreach ($services as $service)
    <tr id="id{{ $service->int_service_id }}">
        <td>{{ $service->str_service_name }}</td>
        <td>{{ $service->dbl_service_price }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $service->int_service_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $service->int_service_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
