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
        <li>Process Refund</li>
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
                {{--  <a id="btn-add" class="btn btn-success" href="{{ route('process-order.create') }}"><i class="fa fa-plus-square fa-fw"></i>&nbsp;Process Order</a>  --}}
              </div>
              <div class="panel-title">
                <h4>Refund Details</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                    <div class="well">
                        <div class="row">
                            <div class="col-xs-6">
                                <dl>
                                    <dt>Invoice Number</dt>
                                    <dd><h3>{{ $refund->invoice->order->str_purc_order_num }}</h3></dd>
                                </dl>
                                <dl>
                                    <dt>Client</dt>
                                    <dd>{{ $refund->invoice->order->client->str_client_name  }}</dd>
                                </dl>
                                <dl>
                                    <dt>Requested by</dt>
                                    <dd>{{ $refund->str_received_by  }}</dd>
                                </dl>
                                {{--<dl>--}}
                                    {{--<dt>Delivery Type</dt>--}}
                                    {{--<dd>{{ $order->footer->str_delivery_type == 0? 'Delivery' : 'Pick-up' }}</dd>--}}
                                {{--</dl>--}}
                            </div>
                            {{--<div class="col-xs-6">--}}
                                {{--<dl>--}}
                                    {{--<dt>Payment Term</dt>--}}
                                    {{--<dd>{{ $order->footer->term->str_terms_pay_name }}</dd>--}}
                                {{--</dl>--}}
                            {{----}}
                                {{--<dl>--}}
                                    {{--<dt>Mode of Payment</dt>--}}
                                    {{--<dd>{{ $order->footer->mode->str_mode_pay_name }}</dd>--}}
                                {{--</dl>--}}
                            {{----}}
                                {{--<dl>--}}
                                    {{--<dt>Downpayment ({{$order->footer->downpayment->int_down_percentage}}%)</dt>--}}
                                    {{--<dd>@money($downpayment)</dd>--}}
                                {{--</dl>--}}
                            {{----}}
                                {{--<dl>--}}
                                    {{--<dt>Discount: {{ $order->footer->discount->str_discount_name }} ({{ $order->footer->discount->int_discount_percentage }}%)</dt>--}}
                                    {{--<dd>@money($discount)</dd>--}}
                                {{--</dl>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div>
                                <h3>Products Returned</h3>
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Variant</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @empty($refund->items)
                                        <tr>
                                            <td colspan="5" class="text-center">No items selected</td>
                                        </tr>
                                        @endempty
                                        @php
                                        $total = 0;
                                        @endphp
                                        @foreach($refund->items as $item)
                                        <tr>
                                            <td>{{ $item->item->variant->product->str_product_name }}</td>
                                            <td>{{ $item->item->variant->str_var_name }}</td>
                                            <td class="text-right">@money($item->item->variant->prices[0]->dbl_price)</td>
                                            <td class="text-right">{{ $item->int_return_quantity }}</td>
                                            <td class="text-right">@money($total = ($item->item->variant->prices[0]->dbl_price * $item->int_return_quantity))</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="4"><h4>Total</h4></th>
                                            <td><h4 class="text-right">@money($total)</h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{--<h4 class="text-right">Subtotal: <span>@money($total)</span></h4>--}}
                            {{--<h4 class="text-right">Less: Discount: <span>(@money($discount))</span></h4>--}}
                            {{--<h3 class="text-right">Total: <span>@money($total_amount)</span></h3>--}}
                            {{--<h5 class="text-right">Downpayment: <span>@money($downpayment)</span></h5>--}}
                            {{--<h5 class="text-right">Balance Due: <span>@money($total_amount - $downpayment)</span></h5>--}}
                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </section>
@endsection