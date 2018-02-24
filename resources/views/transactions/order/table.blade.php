<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Order Reference</th>
      <th class="text-center">Date Created</th>
      <th class="text-center">Client</th>
      <th class="text-center">Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr id="id{{ $order->int_order_id }}">
      <td>{{ $order->str_purc_order_num }}</td>
      <td class="text-center">{{ $order->dat_order_date }}</td>
      <td class="text-center">
        {{ $order->client->str_client_name }}
      </td>
      <td class="text-center">
        <span class="label label-{{ $order->current_status->value->class }}"><i class="fa fa-fw {{ $order->current_status->value->icon }}" aria-hidden="true"></i>&nbsp; {{ $order->current_status->str_status }}</span>
      </td>
      <td class="text-center">
          <button  value="{{ $order->int_order_id }}"class="btn btn-details btn-xs btn-default"><i class="fa fa-circle-o fa-fw"></i>&nbsp; Details</button>
          <button  value="{{ $order->int_order_id }}"class="btn btn-details btn-xs btn-primary"><i class="fa fa-reply fa-fw"></i>&nbsp; Refund</button>
          <button  value="{{ $order->int_order_id }}"class="btn btn-cancel-order btn-xs btn-danger"><i class='fa fa-trash-o fa-fw'></i>&nbsp; Cancel</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>