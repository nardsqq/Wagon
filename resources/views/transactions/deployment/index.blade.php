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
                <li>Process Deployment</li>
                <li>Set Service Schedule</li>
            </ol>
        </div>
    </section>


    <div id="deployment">
        <section id="main">
            @include('transactions.deployment.modal')
            @include('transactions.deployment.assign')
            <div class="container animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-white rounded">
                            <div class="icon">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <strong>Set your <i>Deployment Mobilization schedule</i> here.</strong>
                            <br>
                            <small>Process <i><b>Deployment</b></i>.</small>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <div class="btn-group pull-right">
                                    {{-- <a id="btn-deploy" class="btn btn-success"><i class="fa fa-calendar"></i>&nbsp; Set Service Schedule</a> --}}
                                    <button type="button" id="btn-add" class="btn btn-success"><i
                                                class="fa fa-plus-square"></i>&nbsp; Set Service Schedule
                                    </button>
                                </div>
                                <div class="panel-title">
                                    <h4>Process Deployment</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="table-container">
                                    <div class="row">
                                        @include('transactions.deployment.table')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('meta')
    <meta name="_token" content="{!! csrf_token() !!}"/>
@endsection
@section('scripts')
    <script src="{{ asset('/js/app.js/') }}"></script>
    <script src="{{ asset('/js/ajax/transactions/deployment.js/') }}"></script>
    <script>
        $(document).ready(function () {
            $('#testzxc').select2();
        });

        // $(document).on('click', '#btn-assign', function () {
        //     $('#assign-modal').modal('show');
        // });

        $('#btn-add').on('click', function () {
            $('#deploy-modal').modal('show');
        });

    </script>
@endsection