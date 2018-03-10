@extends('reports.layout')

@section('report-name', 'Sales Report')

@section('table')
    <thead>
        <tr>
            <th>Date</th>
            <th class="money">Product</th>
            <th class="money">Services</th>
            <th class="money">Line Total</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tfoot>
@endsection

@section('datatable-columns')
{ data: 'date', name: 'date'},
{ data: 'products', name: 'products', class: 'sum text-right'},
{ data: 'services', name: 'services', class: 'sum text-right'},
{ data: 'total', name: 'total', class: 'sum text-right'},
@endsection