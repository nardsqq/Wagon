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
        <li>Create</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn" id="create-process-order">
      <div class="row">
        <div class="col-md-12">
            {{ Form::open(['id'=>'process-form', 'class'=>'form-horizontal', 'route'=>'process-order.store', 'method'=>'POST','autocomplete'=>'off']) }}
                <input v-for="product in selected_products" type="hidden" name="products[]" :value="">
                <form-wizard 
                    @on-complete="onComplete"
                    title="Process Order"  
                    shape="tab"  
                    color="#3498db" 
                    error-color="#BC0E0E"
                    finish-button-text="Submit"
                >
                    
                    <tab-content title="Order Details" icon="fa fa-user" :before-change="validateFirstStep">
                        <div class="row">
                            <div class="col-md-12">
                                @include('transactions.order.form.order-details')
                            </div>
                        </div>
                    </tab-content>

                    <tab-content title="Product Order" icon="fa fa-star" :before-change="validateSecondStep">
                    <div class="row">
                            <div class="col-md-12">
                                @include('transactions.order.form.product')
                            </div>
                        </div>
                    </tab-content>

                    <tab-content title="Service ORder" icon="fa fa-star">
                        <div class="row">
                            <div class="col-md-12">
                                @include('transactions.order.form.service')
                            </div>
                        </div>
                    </tab-content>
                    
                    <tab-content title="Terms & Conditions" icon="fa fa-star">
                        <div class="row">
                            <div class="col-md-12">
                                @include('transactions.order.form.terms')
                            </div>
                        </div>
                    </tab-content>

                    <tab-content title="Summary" icon="fa fa-star">
                        <div class="row">
                            <div class="col-md-12">
                                @include('transactions.order.form.summary')
                            </div>
                        </div>
                    </tab-content>
                </form-wizard>
            {{ Form::close() }}
        </div>
      </div>
    </div>
  </section>
@endsection

@section('styles')
  <link href="{{ asset('/plugins/vue-form-wizard/vue-form-wizard.min.css/') }}">
@endsection

@section('scripts')
  <script src="{{ asset('/js/vue.js/') }}"></script>
  <script src="{{ asset('/plugins/vue-form-wizard/vue-form-wizard.js/') }}"></script>
  <script src="{{ asset('/js/ajax/transactions/order-ajax.js/') }}"></script>
@endsection