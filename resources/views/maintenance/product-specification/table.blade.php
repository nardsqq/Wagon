<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Variant Model</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="service-area-list">
    @foreach ($specs as $spec)
    <tr id="id{{ $spec->intDimenID }}">
        <td>{{ $spec->variants->strVarModel }}</td>
        <td class="text-center">
            <a href="{{ route('product-specification.show', $spec->intDimenID) }}" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; View</a>
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $spec->intDimenID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $spec->intDimenID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
