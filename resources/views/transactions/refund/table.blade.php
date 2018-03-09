<table id="dataTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Order Reference</th>
        <th class="text-center">Client</th>
        <th class="text-center">Amount Refunded</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($refunds as $refund)
        <tr id="id{{ $refund->int_refund_invoice_id_fk }}">
            <td class="text-center">{{ $refund->invoice->order->str_purc_order_num  }}</td>
            <td class="text-center">{{ $refund->invoice->order->client->str_client_name }}</td>
            <td class="text-right">@money($refund->items[0]->item->variant->prices[0]->dbl_price *
                $refund->items[0]->int_return_quantity )
            </td>
            <td class="text-center">
                <a href="{{ action('RefundController@show', $refund->int_refund_id) }}" class="btn btn-details btn-xs btn-default"><i class="fa fa-circle-o fa-fw"></i>&nbsp; Details</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>