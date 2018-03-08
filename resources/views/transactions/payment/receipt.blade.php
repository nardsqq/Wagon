<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Receipt | {{ $payment->invoice->order->str_purc_order_num }}</title>
</head>
<body>
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
                // window.focus();
                // window.print();
                // window.close();
            }
        </script>
</head>
<body>
    @foreach($types as $type)
    <h3 class="text-center">MARINE SALES AND SERVICES MANAGEMENT SYSTEM</h3>
    <center>PAYMENT RECEIPT</center>
    <center>{{ $type }}</center>
    <br>
    <br>
    <div style="float:right;">
        Receipt #: PR-{{$payment->int_payment_id}}
    </div>
        Date: {{$payment->dat_date_received->format('F d, Y')}}
    <br>
    <br>
    <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment received from <strong>{{$client->str_client_name}}</strong> with the amount of <strong>@money($payment->dbl_amount)</strong> for  <strong>{{ $order->str_purc_order_num }}</strong>.
    <br>
    <br>
    <br>
    <div style="float:right;">
        @if($order->footer->mode->str_mode_pay_name == 'Cash')
        (X)Cash
    <br>
        (  )Cheque
        @else
        (X)Cash
    <br>
        (  )Cheque
        @endif
    </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Amount Due: @money($amount_due)
    <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount Paid: @money($amount_paid)
    <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance Due: @money($balance_due)
    <br>
    <br>
    <br>
    <div style="float:right;">
        Received by: _____________________
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    @endforeach
    {{--  <h3 class="text-center">MARINE SALES AND SERVICES MANAGEMENT SYSTEM</h3>
    <center>PAYMENT RECEIPT</center>
    <center>(Seller's Copy)</center>
    <br>
    <br>
    <div style="float:right;">
        Receipt #: (PR-(int_payment_id))
    </div>
        Date: (date received)  
    <br>
    <br>
    <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment received from (Client name) with the amount of (Amount received) for (Order #).
    <br>
    <br>
    <br>
    <div style="float:right;">
        (X)Cash
    <br>
        (  )Cheque
    </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Amount Due: (Total ng babayaran)
    <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount Paid: (Total ng nabayad na)
    <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance Due: (Total ng babayaran pa)
    <br>
    <br>
    <br>
    <div style="float:right;">
        Received by: (Personnel name)
    </div>  --}}

</body>
</html>