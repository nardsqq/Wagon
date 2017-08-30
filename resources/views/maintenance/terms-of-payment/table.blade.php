<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Terms Of Payment</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="term-list">
    @foreach ($terms as $term)
    <tr id="id{{$term->intTOPID}}">
        <td>{{ $term->intTOPNumOfDays }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $term->intTOPID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $term->intTOPID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
