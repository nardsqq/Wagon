<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Order Reference</th>
      <th>Delivery Schedule</th>
      <th class="text-center">Location</th>
      <th class="text-center">Personnel-in-Charge</th>
      <th class="text-center">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <td>{{ $order->str_purc_order_num }}</td>
      <td>03-04-2018</td>
      <td class="text-center">Manila, NCR</td>
      <td class="text-center">Tyron delos Reyes</td>
      <td class="text-center">
        <span class="label label-{{ $order->delivery->current_status->value->class }}"><i class="fa fa-fw {{ $order->delivery->current_status->value->icon }}" aria-hidden="true"></i>&nbsp; {{ $order->delivery->current_status->str_status }}</span>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>