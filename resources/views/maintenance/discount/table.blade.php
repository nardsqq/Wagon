<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Discount Name</th>
      <th>Value</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="disc-list">
    @foreach ($discs as $disc)
    <tr id="id{{$disc->intDiscID}}">
        <td>{{ $disc->strDiscName }}</td>
        <td>{{ $disc->decDiscValue }} %</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $disc->intDiscID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $disc->intDiscID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
