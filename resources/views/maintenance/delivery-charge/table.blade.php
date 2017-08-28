<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Delivery Charge</th>
      <th>Description</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="delchar-list">
    @foreach ($delchars as $delchar)
    <tr id="id{{$delchar->intProdCategID}}">
        <td>{{ $delchar->strDelCharName }}</td>
        <td>{{ $delchar->strDelCharWeight }}</td>
        <td>{{ $delchar->strDelCharRate }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $delchar->intProdCategID }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $delchar->intProdCategID }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
