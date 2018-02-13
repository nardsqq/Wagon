<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Brand</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="brand-list">
    @foreach ($brands as $brand)
    <tr id="id{{$brand->int_brand_id}}">
        <td>{{ $brand->str_brand_name }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $brand->int_brand_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $brand->int_brand_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
