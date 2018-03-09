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
        <li>Order Processing</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong> Manage your <i>Orders</i> here.</strong>
            <br>
            <small>Create, Refund or Cancel an <i><b> Order</b></i>.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                {{--  <a id="btn-add" class="btn btn-success" href="{{ route('process-order.create') }}"><i class="fa fa-plus-square fa-fw"></i>&nbsp;Process Order</a>  --}}
              </div>
              <div class="panel-title">
                <h4>Orders</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                    <div class="well">
                        <div class="row">
                            <div class="col-xs-6">
                                <dl>
                                    <dt>Purchase Order Number</dt>
                                    <dd><h3>{{ $order->str_purc_order_num }}</h3></dd>
                                </dl>
                                <dl>
                                    <dt>Client</dt>
                                    <dd>{{ $order->client->str_client_name }}</dd>
                                </dl>
                                <dl>
                                    <dt>Delivery Type</dt>
                                    <dd>{{ $order->footer->str_delivery_type == 0? 'Delivery' : 'Pick-up' }}</dd>
                                </dl>
                            </div>
                            <div class="col-xs-6">
                                <dl>
                                    <dt>Payment Term</dt>
                                    <dd>{{ $order->footer->term->str_terms_pay_name }}</dd>
                                </dl>
                            
                                <dl>
                                    <dt>Mode of Payment</dt>
                                    <dd>{{ $order->footer->mode->str_mode_pay_name }}</dd>
                                </dl>
                            
                                <dl>
                                    <dt>Downpayment ({{$order->footer->downpayment->int_down_percentage}}%)</dt>
                                    <dd>@money($downpayment)</dd>
                                </dl>
                            
                                <dl>
                                    <dt>Discount: {{ $order->footer->discount->str_discount_name }} ({{ $order->footer->discount->int_discount_percentage }}%)</dt>
                                    <dd>@money($discount)</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12">
                            @if($order->item_orders->count() > 0)
                            <div>
                                <h3>Products</h3>
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Product</th>
                                            <th class="text-center">Variant</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @empty($order->item_orders)
                                        <tr v-if="selected_variants.length === 0">
                                            <td colspan="5" class="text-center">No items selected</td>
                                        </tr>
                                        @endempty

                                        @foreach($order->item_orders as $item)
                                        <tr>
                                            <td>{{ $item->variant->product->str_product_name }}</td>
                                            <td>{{ $item->variant->str_var_name }}</td>
                                            <td class="text-right">@money($item->price)</td>
                                            <td class="text-right">{{ $item->int_quantity }}</td>
                                            <td class="text-right">@money(($item->amount))</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="4"><h4>Total</h4></th>
                                            <td><h4 class="text-right">@money($total)</h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div>
                                <h3>Services</h3>
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Service</th>
                                            <th class="text-center">Service Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($order->service_orders as $item)
                                        <tr v-else v-for="(service, index) in selected_services" :key="service.int_service_id">
                                            <td>{{ $item->service->str_service_name }}</td>
                                            <td class="text-right">@money($item->service->dbl_service_price)</td>
                                        </tr>
                                        @empty
                                        <tr v-if="selected_services.length <= 0">
                                            <td colspan="3" class="text-center">No service selected</td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td><h4>Total (Services)</h4></td>
                                            <td class="text-right"><h4>@money( $total_services =  $order->service_orders->sum('amount'))</h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                
                                <h3>Materials</h3>
                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Material</th>
                                            <th class="text-center">Variant</th>
                                            <th class="text-center">Type of Acquisition</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @empty($materials)
                                        <tr v-if="materials.length <= 0">
                                            <td colspan="6" class="text-center">No materials needed</td>
                                        </tr>
                                        @endempty
                                        @foreach($materials as $item)
                                        <tr v-else v-for="(material, index) in materials" :key="material.int_material_id">
                                            <td>{{ $item->variant->product->str_product_name }}</td>
                                            <td>
                                                @isset($item->variant)
                                                {{ $item->variant->str_var_name }}
                                                @endisset
                                            </td>
                                            <td>{{ $item->acqui_type }}</td>
                                            <td class="text-right"><span v-if="!isEmpty(material.variant)">
                                                @isset($item->variant)
                                                    @money($item->variant->price)
                                                @endisset
                                            </span></td>
                                            <td class="text-right"><span v-if="material.acqui_type!=2 && !isEmpty(material.variant)">{{ $item->int_quantity }}</span></td>
                                            <td class="text-right"><span v-if="material.acqui_type!=2 && !isEmpty(material.variant)">@money($item->amount)</span></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5"><h4>Total (Materials)</h4></td>
                                            <td class="text-right"><h4>@money($total_materials = $materials->sum('amount'))</h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            <h4 class="text-right">Subtotal: <span>@money($total)</span></h4>
                            <h4 class="text-right">Less: Discount: <span>(@money($discount))</span></h4>
                            <h3 class="text-right">Total: <span>@money($total_amount)</span></h3>
                            <h5 class="text-right">Downpayment: <span>@money($downpayment)</span></h5>
                            <h5 class="text-right">Balance Due: <span>@money($total_amount - $downpayment)</span></h5>
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