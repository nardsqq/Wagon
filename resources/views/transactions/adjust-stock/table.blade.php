<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
    <thead>
      <tr>
        <th>Product</th>
        <th>Variant</th>
        <th>Action</th>
        <th>Quantity</th>
        <th>Previous Stock</th>
        <th>Current Stock</th>
        <th>Reason</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody id="mode-list">
      @foreach($adjustments as $a)
      @php $stock = $a->variant->getCurrPrevStock($a->created_at); @endphp
      <tr id="id{{$a->int_stock_adjust_id}}">
          <td>{{$a->variant->product->str_product_name}}</td>
          <td>{{$a->variant->str_var_name}}</td>
          <td>{{$a->str_action}}</td>
          <td>{{$a->int_quantity}}</td>
          <td>{{$stock['previous']}}</td>
          <td>{{$stock['current']}}</td>
          <td>{{$a->txt_reason}}</td>
          <td>{{$a->created_at->format('F d, Y')}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  