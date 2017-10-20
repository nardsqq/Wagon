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
        <li>Sales Order</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div id="add_so">
            <form id="formSO" method="POST" action="{{ route('sales-order.store') }}">
            {{ csrf_field() }}
            {{ Form::hidden('intSO_QuotH_ID', $quote->intQuotHeadID) }}
              <div class="">
                <div class="modal-content">
                  <div class="modal-header modal-header-primary" id="so-modal-header">
                    <h4 id="title">Create Sales Order</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">

                      <div class="col-xs-6">
                        <label for="intClientID">Company Name/Client</label>
                        <h3>{{ $quote->client->strClientName }}</h3>
                      </div>
                    <div class="col-xs-6">
                      <label for="strClientAssoc">Client PO Number</label>
                      <input type="text" name="strSalesOrderCPONumber" id="strSalesOrderCPONumber" class="form-control">
                    </div>
                      <div class="col-xs-6">
                        <label for="strClientAssoc">Client Associate Name</label>
                        <h3>{{ $quote->strClientAssoc }}</h3>
                      </div>
                      <div class="col-xs-6">
                        <label for="strQuotHeadLocation">Location</label>
                        <h3>{{ $quote->strQuotHeadLocation }}</h3>
                      </div>
                      <div class="col-xs-6">
                        <label for="dtmQuotHeadDateTime">Date</label>
                        <h3>{{ $quote->dtmQuotHeadDateTime->format('F d, Y') }}</h3>
                      </div>
                    </div>
                    <div class="row m-t-10">
                      <div class="col-xs-6">
                        <label for="intPersID">Agent</label>
                        <h3>{{ $quote->agent->strAgentFName }} {{ $quote->agent->strAgentLName }}</h3>
                      </div>
                    </div>
                    <div class="row m-t-10">
                      <div class="col-md-12">
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
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(product, index) in products" :key="index">
                              <td class="text-center">@{{ index + 1 }}</td>
                              <td class="text-center">
                                <input hidden readonly name="products[]" :value="product.variant.intVarID"> @{{ product.variant.full_detail
                                }}
                              </td>
                              <td class="text-center"><input class="form-control" type="number" min="0" v-model.number="product.intQuotDPQuantity" name="qty[]"></td>
                              <td class="text-center"><input class="form-control" type="number" min="0" v-model.number="product.decQuotDPUnitPrice" name="price[]"></td>
                              <td class="text-center">@{{ (product.intQuotDPQuantity * product.decQuotDPUnitPrice).toLocaleString('en-PH', {'minimumFractionDigits':2,
                                'maximumFractionDigits':2}) }}</td>
                              <td class="text-center">
                                <button type="button" @click="removeProduct(index)" class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <hr>

                    <div>
                      <h4>TOTAL: <small>@{{ subtotal.toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2}) }}</small></h4>
                      {{--
                      <h4>TAX RATE: <small>0.00</small></h4>
                      <h4>SALES TAX: <small>0.00</small></h4>
                      <h4>OTHER: <small>-</small></h4> --}}
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button id="btn-save" type="submit" value="add" class="modal-btn btn btn-primary pull-right">Submit</button>
                    <input type="hidden" id="link_id" name="link_id" value="0">
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
   
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('/js/vue.js/') }}"></script>
  <script>
    new Vue({
        el: '#main',
        data: {
            products: {!! $quote->products !!},
        },
        computed: {
            subtotal(){
                var sum = 0;
                _.forEach(this.products, function(p){ sum += (p.intQuotDPQuantity * p.decQuotDPUnitPrice); });
                return sum;
            },
        },
        methods: {
            removeProduct(index){
              if(this.products.length > 1)
                this.products.splice(index, 1);

            },
        }
    });
  </script> 
@endsection