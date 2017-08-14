<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Warehouse Name</th>
      <th>Location</th>
      <th>Description</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="warehouse-list">
    @foreach ($warehouses as $warehouse)
    <tr id="id{{$warehouse->intWarehouseID}}">
        <td>{{ $warehouse->strWarehouseName }}</td>
        <td>{{ $warehouse->txtWarehouseLocation }}</td>
        <td>{{ $warehouse->txtWarehouseDesc }}</td>
        <td class="text-center">
          <input type="checkbox" id="isActive" name="isActive" data-toggle="toggle" data-style="android"
          data-onstyle="success" data-offstyle="default" data-on="Active" data-off="" data-size="mini">
        </td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail edit-modal" @click.prevent="editWarehouse(warehouse)"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" @click.prevent="deleteWarehouse(warehouse)"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
