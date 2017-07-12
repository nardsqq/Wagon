<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Product Status</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="productinventory-list">
    @foreach ($prodinvent as $prodinvents)
    <tr id=id"{{$prodinvents->intProductInventoryID}}">
      <td>{{ $prodinvents->strProductName }}</td>
      <td>{{ $prodinvents->intProductQuantity }}</td>
      <td>{{ $prodinvents->strProdInventoryStatusName }}</td>
      <td class="text-center">
        <input type="checkbox" id="isActive" name="isActive" value="{{$prodinvents->intProductInventoryID}}" 
          @if (($prodinvents->isActive)==1){{"checked"}}
          @endif data-toggle="toggle" data-style="android" data-onstyle="success" data-offstyle="default" data-on="Active" data-off="Inactive" data-size="mini"></td>
      <td class="text-center">
          <button class="btn btn-warning btn-sm btn-detail open-modal" value="{{$prodinvents->intProductInventoryID}}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
          <button class="btn btn-danger btn-sm btn-delete" value="{{$prodinvents->intProductInventoryID}}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
