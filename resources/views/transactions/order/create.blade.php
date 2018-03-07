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
        <div class="container">
            <div class="row">
                <div class="col-xs-12" id="process-form">
                    {{ Form::open(['id'=>'process-order-form', 'class'=>'form-horizontal', 'route'=>'process-order.store', 'method'=>'POST']) }}
                        <div id="smartwizard" class="panel">
                            <ul class="">
                                <li><a href="#step-0">Client Information</a></li>
                                <li><a href="#step-1">Order Details</a></li>
                                <li v-if="order_type == 0"><a href="#step-2">Product Order</a></li>
                                <li v-else><a href="#step-3">Service Order</a></li>
                                <li><a href="#step-4">Terms & Conditions</a></li>
                                <li><a href="#step-5">Summary</a></li>
                            </ul>

                            <div class="panel-body">
                                <div id="step-0" class="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('transactions.order.form.client-details')
                                        </div>
                                    </div>
                                </div>
                                <div id="step-1" class="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('transactions.order.form.order-details')
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2" v-show="order_type == 0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('transactions.order.form.product')
                                        </div>
                                    </div>
                                </div>
                                <div id="step-3" v-show="order_type == 1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('transactions.order.form.service')
                                        </div>
                                    </div>
                                </div>
                                <div id="step-4" class="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('transactions.order.form.terms')
                                        </div>
                                    </div>
                                </div>
                                <div id="step-5" class="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('transactions.order.form.summary')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <link href="{{ asset('/plugins/smartwizard/smart_wizard.min.css/') }}">
@endsection

@section('scripts')
    <script src="{{ asset('/js/app.js/') }}"></script>
    <script src="{{ asset('/plugins/smartwizard/jquery.smartWizard.js/') }}"></script>
    <script src="{{ asset('/js/ajax/transactions/order-ajax.js/') }}"></script>
@endsection