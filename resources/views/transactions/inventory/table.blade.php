<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Part Number</th>
      <th class="text-center">Product</th>
      <th class="text-center">Re-Stock Level</th>
      <th class="text-center">Quantity</th>
      <th class="text-center">Status</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody id="stock-list">
    @foreach($variants as $variant)
    <tr id="#">
        <td>{{$variant->strVarPartNum}}</td>
        <td class="text-center">{{$variant->brands->strVarPartNumBrand}} - {{ $variant->strVarModel}}</td>
        <td class="text-center">{{$variant->intVarReStockLevel}}</td>
        <td class="text-center">{{ $variant->current_stock }}</td>
        @if($variant->current_stock > $variant->intVarReStockLevel)
          <td class="text-center"><span class="label label-default">Normal</span></td>
        @elseif($variant->current_stock <= $variant->intVarReStockLevel && $variant->intVarReStockLevel > 0)
          <td class="text-center"><span class="label label-warning">Needs Re-Stock</span></td>
        @elseif($variant->current_stock == 0)
          <td class="text-center"><span class="label label-danger">Out of Stock</span></td>
        @endif
        <td class="text-center">
          <button class="btn btn-details btn-sm btn-default"><i class="fa fa-circle-o fa-fw"></i>&nbsp; Details</button>
          <button class="btn btn-replenish btn-sm btn-success"><i class="fa fa-refresh fa-fw"></i>&nbsp; Replenish</button>
          <button class="btn btn-adjust btn-sm btn-info"><i class="fa fa-sort fa-fw"></i></i>&nbsp; Adjust</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
