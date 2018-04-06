<table id="dataTable" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Order Reference</th>
            <th class="text-center">Client</th>
            <th class="text-center">Term</th>
            <th class="text-center">Balance</th>
            <th class="text-center">Latest Payment</th>
            <th class="text-center">Amount Due</th>
            <th class="text-center">Due Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr id="id{{ $order->int_order_id }}">
        <td>{{ $order->str_purc_order_num }}</td>
        <td class="text-center">{{ $order->client->str_client_name }}</td>
        <td class="text-right">{{ $order->footer->term->term }}</td>
        <td class="text-right">@money($order->invoice->dbl_total_amount - $order->invoice->payments()->sum('dbl_amount'))</td>
        <td class="text-center">
                @if($order->invoice->payments->count() > 0)
                    {{ $order->invoice->payments()->latest()->first()->dat_date_received->format('F d, Y') }}
                @else
                    N/A
                @endif
            </td>
        <td class="text-right">amount due</td>
        <td class="text-right">due date</td>
        
        <td class="text-center">
            <a href="{{ action('PaymentController@payments', $order->int_order_id) }}" class="btn btn-details btn-xs btn-default"><i class="fa fa-circle-o fa-fw"></i>&nbsp; Details</a>
            <button  value="{{ $order->int_order_id }}"class="btn btn-details btn-xs btn-primary"><i class="fa fa-reply fa-fw"></i>&nbsp; Receive Payment</button>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>