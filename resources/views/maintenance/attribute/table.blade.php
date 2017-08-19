<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Type</th>
      <th>Attribute</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="attribute-list">
    @foreach ($attribs as $attrib)
    <tr id="id{{$attrib->intAttribID}}">
        <td>Product</td>
        <td>{{ $attrib->strAttribName }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $attrib->intAttribID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $attrib->intAttribID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
