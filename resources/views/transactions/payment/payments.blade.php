@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-bar-chart" aria-hidden="true"></i> Transactions</h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </div>
  </header>

  <div class="container fadeIn">
    @include('partials._menu')
  </div>

  <section id="breadcrumb">
    <div class="container animated fadeIn">
      <ol class="breadcrumb">
        <li>Admin</li>
        <li>Transactions</li>
        <li>Process Payment</li>
        <li>{{ $order->str_purc_order_num }}</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <a id="btn-add" class="btn btn-success" href="{{ route('payment.create') }}"><i class="fa fa-plus-square fa-fw"></i>&nbsp;Process Payment</a>
              </div>
              <div class="panel-title">
                <h4>Payments | {{ $order->str_purc_order_num }}</h4>
              </div>
            </div>
            <div class="well">
                Purchase Order #: {{ $order->str_purc_order_num }} <br>
                Client: {{ $order->client->str_client_name }} <br>
                Total Amount Due: @money($order->invoice->dbl_total_amount) <br>
                Amount Paid: @money($paid = $order->invoice->payments()->sum('dbl_amount')) <br>
                Balance Due: @money($order->invoice->dbl_total_amount - $paid) <br>
            </div>
            <div class="panel-body">
              <div id="table-container">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount Paid</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->invoice->payments->reverse() as $payment)
                            <tr id="id{{ $payment->int_payment_id }}">
                                <td class="text-center">{{ $payment->dat_date_received->format('F d, Y') }}</td>
                                <td class="text-right">@money($paid = $payment->dbl_amount)</td>
                                <td class="text-center">
                                        <a href="{{ action('PaymentController@receipt', $payment->int_payment_id) }}" class="btn btn-details btn-xs btn-default"><i class="fa fa-circle-o fa-fw"></i>&nbsp; View Receipt</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </section>
@endsection

@section('scripts')

@endsection