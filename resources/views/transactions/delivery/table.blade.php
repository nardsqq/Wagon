<table id="dataTable" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Order Reference</th>
      <th>Delivery Schedule</th>
      <th class="text-center">Personnel-in-Charge</th>
      <th class="text-center">Location</th>
      <th class="text-center">Status</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($deliveries as $delivery)
    <tr>
      <td>{{ $delivery->order->str_purc_order_num }}</td>
      <td>{{ $delivery->dat_delivery_date or 'Not Set' }}</td>
      <td class="text-center">{{ $delivery->personnel->name or 'Not Set' }}</td>
      <td class="text-center">{{ $delivery->order->txt_deli_address }}</td>
      <td class="text-center">
        <span class="label label-{{ $delivery->current_status->value->class }}"><i class="fa fa-fw {{ $delivery->current_status->value->icon }}" aria-hidden="true"></i>&nbsp; {{ $delivery->current_status->str_status }}</span>
      </td>
      <td class="text-center">
          @if($delivery->current_status->str_status == 'New')
          <button class="btn btn-primary btn-xs btn-detail open-modal" value="{{ $delivery->int_delivery_id }}"
              data-date="{{ $delivery->dat_delivery_date }}"
              data-personnel="{{ $delivery->int_del_personnel_id_fk }}"
            ><i class='fa fa-calendar'></i>&nbsp; Set Delivery Details</button>
          @elseif($delivery->current_status->str_status == 'On delivery')
          
          <a target="_blank" href="{{ route('delivery.receipt', $delivery->int_delivery_id) }}"class="btn btn-details btn-xs btn-default"><i class="fa fa-circle-o fa-fw"></i>&nbsp; View Delivery Receipt</a>
          <a href="{{ route('delivery.complete', $delivery->int_delivery_id) }}"class="btn btn-success btn-xs btn-detail open-complete-modal" value="{{ $delivery->int_delivery_id }}"
            ><i class='fa fa-check'></i>&nbsp; Delivery Completed</a>
          @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>