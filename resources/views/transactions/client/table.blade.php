<table id="dataTable" class="table table-bordered table-hover table-condensed" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Telephone #</th>
      <th>Mobile #</th>
      <th>Email Address</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="client-list">
    @foreach ($clients as $client)
    <tr id="id{{$client->intClientID}}">
        <td>{{ $client->strClientName }}</td>
        <td>{{ $client->strClientTelephone }}</td>
        <td>{{ $client->strClientMobile }}</td>
        <td>{{ $client->strClientEmailAddress }}</td>        
        <td class="text-center">
            <a href="{{ route('client.show', $client->intClientID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <a href="{{ route('client.edit', $client->intClientID) }}" class="btn btn-info btn-sm btn-detail"><i class='fa fa-edit'></i>&nbsp; Edit</a>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $client->intClientID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
            <input type="hidden" id="link_id" name="link_id" value="0">
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
