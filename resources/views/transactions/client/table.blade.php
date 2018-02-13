<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Client</th>
      <th>TIN</th>
      <th>Address</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="client-list">
    @foreach ($clients as $client)
      <tr id="id{{ $client->int_client_id }}">
        <td>{{ $client->str_client_name }}</td>
        <td>{{ $client->str_client_tin }}</td>
        <td>
          {{ $client->txt_client_address }}
        </td>
        <td class="text-center">
            <a href="{{ route('client.show', $client->int_client_id) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $client->int_client_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $client->int_client_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
