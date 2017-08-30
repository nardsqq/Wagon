<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Delivery Charge</th>
      <th>Weight</th>
      <th>Rate</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="delchar-list">
    @foreach ($delchars as $delchar)
    <tr id="id{{$delchar->intDelCharID}}">
        <td>{{ $delchar->strDelCharName }}</td>
        <td>{{ $delchar->decDelCharWeight }}</td>
        <td>{{ $delchar->decDelCharRate }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $delchar->intDelCharID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $delchar->intDelCharID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
