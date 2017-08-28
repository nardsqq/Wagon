<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Vehicle Type</th>
      <th>Weight</th>
      <th>Rate</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="delivery-charge-list">
    @foreach ($delcharges as $delcharge)
    <tr id="id{{ $delcharge->intDelCharID }}">
        <td>{{ $delcharge->strDelCharName }}</td>
        <td>{{ $delcharge->strDelCharWeight }}</td>
        <td>{{ $delcharge->strDelCharRate }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $delcharge->intDelCharID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $delcharge->intDelCharID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
