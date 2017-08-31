<table id="dataTable" class="table table-bordered table-hover table-condensed" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Category</th>
      <th>Name</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="client-list">
    @foreach ($clients as $client)
    <tr id="id{{$client->intClientID}}">
        <td>{{ $client->strClientName }}</td>
        <td>{{ $client->strClientAddLotNum }}</td>
        <td>{{ $client->strClientAddStreet }}</td>
        <td>{{ $client->strClientAddBrgy }}</td>
        <td>{{ $client->strClientAddCity }}</td>
        <td>{{ $client->strClientAddProv }}</td>
        <td>{{ $client->strClientTelephone }}</td>
        <td>{{ $client->strClientFax }}</td>
        <td>{{ $client->strClientMobile }}</td>
        <td>{{ $client->strClientEmailAddress }}</td>        
        <td>{{ $client->strClientTIN }}</td>
        <td class="text-center">
            <a href="{{ route('client.show', $client->intClientID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <a href="{{ route('client.edit', $client->intClientID) }}" class="btn btn-info btn-sm btn-detail"><i class='fa fa-edit'></i>&nbsp; Edit</a>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $client->intClientID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
