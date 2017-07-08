<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Client</th>
      <th class="text-center">Contact</th>
      <th class="text-center">FAX</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="client-list">
    @foreach ($client as $clients)
    <tr id=id"{{$clients->intClientID}}">
      <td>{{ $clients->strClientName }}</td>
      <td class="text-center">{{ $clients->strClientTelephone }}</td>
      <td class="text-center">{{ $clients->strClientFax }}</td>
      <td class="text-center"><input type="checkbox" id="isActive" name="isActive" value="{{$clients->intClientID}}" 
          @if (($clients->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="Active" data-off="Inactive" data-size="mini">
      </td>
      {{-- <td class="text-center">
        <span class="label label-primary"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; New</span>
        <span class="label label-success">Inquiry Phase</span>
      </td> --}}
      <td class="text-center">
          {{-- <button class="btn btn-info btn-sm btn-detail open-modal"><i class='fa fa-book'></i>&nbsp; View</button> --}}
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$clients->intClientID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$clients->intClientID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>