<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery Receipt</title>
<style>
        html, body {
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            margin: 1in;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .text-underline {
            text-decoration: underline;
        }
        table {
            table-layout: fixed;
            border-collapse: collapse;
        }
        table td {
            padding: 0 3px;
        }
    </style>
    
    <script>
            window.onload = function(){
                window.focus();
                window.print();
                window.close();
            }
        </script>
</head>
<body>
    <h3 class="text-center">MARINE SALES AND SERVICES MANAGEMENT SYSTEM</h3>
    <center>DELIVERY RECEIPT</center>
    <br>
    SOLD TO: {!! \ViewHelper::center_underline($order->client->str_client_name, 45) !!}  
    Date:    {!! \ViewHelper::center_underline($order->dat_order_date->format('m-d-y'), 8) !!} 
        <br>
        ADDRESS: {!! \ViewHelper::center_underline($order->client->txt_client_address, 55) !!}  
        <br>
        TIN: {!! \ViewHelper::center_underline($order->client->str_client_tin, 17) !!}  
        PO# {!! \ViewHelper::center_underline($order->str_purc_order_num, 17) !!}  
        Terms: {!! \ViewHelper::center_underline($order->footer->term->term, 17) !!}  
    <br>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th style="width: 40px">QTY</th>
                <th style="width: 50px">UNIT</th>
                <th colspan="3" style="width: 500px;">ITEM DESCRIPTION</th>
            </tr>
        </thead>
        <tbody>
            @php $rowCount = 14; $counter = 0; $total = 0; $material_total = 0; $service_total = 0; @endphp
            @foreach($order->item_orders as $item)
            @php $total += ($item->amount); @endphp
            <tr>
                <td>{{ $item->int_quantity }}</td>
                <td>pc</td>
                <td colspan="3">{{ str_limit($item->variant->product->str_product_name.'-'.$item->variant->str_var_name, 80) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div style="float:right;">
        Received the above items in good order and condition.
    </div>
    <br>
    <br>
    <br>
    <span>
        Prepared by:
    </span>
    <span style="padding-left:100px;">
        Approved by:
    </span>
    <span style="padding-left:100px">
        Received by:
    </span>
    <br>
    <br>
    <br>
    <span>
        _________________
    </span>
    <span style="padding-left:40px;">
        _________________
    </span>
    <span style="padding-left:40px">
        _________________
    </span>
</body>
</html>