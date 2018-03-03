<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
    <thead>
      <tr>
        <th>Product</th>
        <th>Variant</th>
        <th>Quantity</th>
        <th>Previous Stock</th>
        <th>Current Stock</th>
        <th>Unit Price</th>
        <th>Date</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody id="mode-list">
      @foreach($replenishments as $a)
      @php $stock = $a->variant->getCurrPrevStock($a->created_at); @endphp
      <tr id="id{{$a->int_replenish_id}}">
          <td>{{$a->variant->product->str_product_name}}</td>
          <td>{{$a->int_repl_var_id_fk}}</td>
          <td>{{$a->int_quantity}}</td>
          <td>{{$stock['previous']}}</td>
          <td>{{$stock['current']}}</td>
          <td>{{$a->dbl_unit_price}}</td>
          <td>{{$a->created_at->format('F d, Y')}}</td>
          <td class="text-center">
              <a href="#" data-id="{{$a->int_replenish_id}}" class="btn btn-sm btn-default show-details"><i class='fa fa-circle-o'></i>&nbsp; Details</a>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  