<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Unit</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="uom-list">
    @foreach ($uoms as $uom)
      <tr id="id{{ $uom->intUOMID }}">
          <td>{{ $uom->strUOMUnit }}</td>
          <td>{{ $uom->strUOMUnitName }}</td>
          <td class="text-center">
              <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $uom->intUOMID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
              <button class="btn btn-danger btn-sm btn-delete" value="{{ $uom->intUOMID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
