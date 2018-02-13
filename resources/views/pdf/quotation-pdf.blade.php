@php $product_total = 0;$service_total = 0; @endphp
<!DOCTYPE html>
<html>
<head>
    <title>TAITECH MARINE SALES AND SERVICES CORPORATION - Quotation Form</title>
</head>
    <style type="text/css">
        @page{
            margin-top: 1cm;
            margin-bottom: 0.25cm;
        }
        body{
            font-family: "SegoeUI","Sans-serif";
            font-size: 12px;
        }
        .header{
            font-size: 20px!important;
        }
        .page-break {
            page-break-after: always;
        }
        .center{
            text-align: center;
        }
        .col-md-12{
            width: 100%;
        }
        .col-md-6{
            width: 50%;
        }
        .border{
            border: 1px solid black;
        }
        .space {
            padding: 1px;
        }
        .text-center{
            text-align: center;
        }
        table{
            clear: both;
            border: 1px solid black
        }
        tbody tr{
            border: 1px solid black;
        }
        tr:nth-child(even) {
            background-color: #e6e6e6
        }
        thead th{
            background-color: black;
            color: white;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
        .footerd{
            font-size: 0.8em;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
<body>
    <div style="float:left">
        <center><h1>TAITECH MARINE SALES AND SERVICES CORPORATION QUOTATION FORM</h1></center>
        <br>
    </div>
    <br>
    <br>
    <h2>CLIENT: <span style="float: right;">{{ $quote->client->str_client_name }}</span></h2>
    <h2>ADDRESS: <span style="float: right;">{{ $quote->client->strClientAddLotNum }}, {{ $quote->client->strClientAddStreet }}, {{ $quote->client->strClientAddBrgy }}, {{ $quote->client->strClientAddCity }}, {{ $quote->client->strClientAddProv }}</span></h2>
    <br>
    <table width="100%">
        <thead>
            <tr>
                <th class="text-center">Location</th>
                <th class="text-center">Date</th>
                <th class="text-center">Agent</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    {{ $quote->strQuotHeadLocation }}
                </td>
                <td class="text-center">
                    {{ $quote->dtmQuotHeadDateTime }}
                </td>
                <td class="text-center">
                    {{ $quote->agent->strPersLName }},
                    {{ $quote->agent->strPersFName }}
                    {{ $quote->agent->strPersMName }}
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <div>
        <h2>Products or Services Quoted:</h2>
        @if($quote->products->count() > 0)
            <div class="border">
                <h4 class="text-center">
                    Products
                </h4>
            </div>
            <table class="table table-hover table-condensed table-bordered table-responsive m-t-20" style="width: 100%">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Product</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Unit Price</th>
                  <th class="text-center">Total Cost</th>
                </tr>
              </thead>
              <tbody>
                @foreach($quote->products as $product)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">
                    {{ $product->variant->full_detail }}
                  </td>
                  <td class="text-center">{{ $product->intQuotDPQuantity }}</td>
                  <td class="text-center">{{ $product->decQuotDPUnitPrice }}</td>
                  <td class="text-center">{{ $product_total += $product->intQuotDPQuantity * $product->decQuotDPUnitPrice }}</td>
                </tr>
                @endforeach
              </tbody>
              </table>
              <h3 style="text-align: right">Products Total: {{ $product_total }}</h3>
            @endif

            @if($quote->services->count() > 0)
            <div class="border">
                <h4 class="text-center">
                    Services
                </h4>
            </div>
            <table class="table table-hover table-condensed table-bordered table-responsive m-t-20" style="width: 100%">
              <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Service</th>
                    <th class="text-center">Service Fee</th>
                </tr>
              </thead>
              <tbody>
                @foreach($quote->services as $service)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">
                    {{ $service->strServAreaName }}
                  </td>
                  <td class="text-center">{{ $service->intQuotDPQuantity }}</td>
                  <td class="text-center">{{ $service_total +=  $service->decQuotDSPrice }}</td>
                </tr>
                @endforeach
              </tbody>
              </table>
              <h3 style="text-align: right">Services Total: {{ $service_total }}</h3>
            @endif

            
              <h2 style="text-align: right">Total: {{ $service_total + $product_total }}</h2>
    </div>
    <div class="footer">
    </div>
</body>
</html>