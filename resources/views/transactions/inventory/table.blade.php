<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Part Number</th>
      <th class="text-center">Supplier</th>
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
        <td class="text-center">Supplier Name</td>
        <td class="text-center">{{$variant->brands->strVarPartNumBrand}} - {{ $variant->strVarModel}}</td>
        <td class="text-center">{{$variant->intVarReStockLevel}}</td>
        <td class="text-center">{{ $variant->intVarQty }}</td>
        @if($variant->intVarQty > $variant->intVarReStockLevel)
          <td class="text-center"><span class="label label-default">Normal</span></td>
        @elseif($variant->intVarQty <= $variant->intVarReStockLevel && $variant->intVarReStockLevel > 0)
          <td class="text-center"><span class="label label-warning">Needs Re-Stock</span></td>
        @elseif($variant->intVarQty == 0)
          <td class="text-center"><span class="label label-danger">Out of Stock</span></td>
        @endif
        <td class="text-center">
          <a href="#" class="btn btn-sm btn-default"><i class='fa fa-circle-o'></i>&nbsp; Details</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
