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
      <tr id="id{{ $client->intClientID }}">
        <td>{{ $client->strClientName }}</td>
        <td>{{ $client->strClientTIN }}</td>
        <td>
          {{ $client->strClientAddLotNum }}, 
          {{ $client->strClientAddStreet }}, 
          {{ $client->strClientAddBrgy }},
          {{ $client->strClientAddCity }},
          {{ $client->strClientAddProv }},
        </td>
        <td class="text-center">
            <a href="{{ route('client.show', $client->intClientID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $client->intClientID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $client->intClientID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
