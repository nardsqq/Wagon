<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Invoice | {{ $order->str_purc_order_num }}</title>
    <style>
        html, body {
            font-family: Arial, Helvetica, sans-serif;
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
    <center>SALES INVOICE</center>
    <br>
SOLD TO: {!! \ViewHelper::center_underline($order->client->str_client_name, 45) !!}  
Date:    {!! \ViewHelper::center_underline($order->dat_order_date->format('m-d-y'), 10) !!} 
    <br>
    ADDRESS: {!! \ViewHelper::center_underline($order->client->txt_client_address, 45) !!}  
    Terms: {!! \ViewHelper::center_underline($order->client->str_client_name, 15) !!}  
    <br>
    TIN: {!! \ViewHelper::center_underline($order->client->str_client_tin, 15) !!}  
    Business Style: {!! \ViewHelper::center_underline('', 20) !!}  
    PO# {!! \ViewHelper::center_underline($order->str_purc_order_num, 15) !!}  
    <br>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th style="width: 40px">QTY</th>
                <th style="width: 50px">UNIT</th>
                <th colspan="3" style="width: 300px;">DESCRIPTION</th>
                <th style="width: 100px;">U.PRICE</th>
                <th style="width: 100px;">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
            @php $rowCount = 14; $counter = 0; $total = 0; @endphp
            @foreach($order->item_orders as $item)
            <tr>
                <td>{{ $item->int_quantity }}</td>
                <td>pc</td>
                <td colspan="3">{{ str_limit($item->str_product_name, 80) }}</td>
                <td class="text-right">@money($item->variant->price)</td>
                <td class="text-right">@money($total += ($item->variant->price * $item->int_quantity))</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2"><br></th>
                <th colspan="2"></th>
                <th colspan="2"></th>
                <th></th>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td style="width: 100px;">Vatable Sales</td>
                <td style="width: 100px;"></td>
                <td style="width: 100px;" colspan="2">Total Sales</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>VAT-Exempt Sales</td>
                <td></td>
                <td colspan="2">Less: VAT</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>Zero Rated Sales</td>
                <td></td>
                <td colspan="2">Amount: Net of VAT</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td>VAT Amount</td>
                <td></td>
                <td colspan="2">Add: VAT</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right">TOTAL AMOUNT DUE</td>
                <td class="text-right">@money($total)</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>