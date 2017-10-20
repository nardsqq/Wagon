



@extends('reports.report_layout')
@section('title')
	Sales Report
@endsection
@section('start_date')
	{{$start}}
@endsection

@section('end_date')
	{{$end}}
@endsection

@section('report_title')
	Sales Reports
@endsection

@section('content')
	
	@php
		$ctr = 0;
		$totalCost = 0;
	@endphp
	<table style="border: 1px solid black;">
		<thead>
			<tr style="border: 1px solid black; background-color: yellow;">
				<th></th>
				<th style="border: 1px solid black;"><center>Part Number</center></th>
				<th style="border: 1px solid black;"><center>Model</center></th>
				<th style="border: 1px solid black;"><center>Inventory Cost</center></th>
				<th style="border: 1px solid black;"><center>Quantity</center></th>
				
				
			</tr>
		</thead>
		<tbody>
			@foreach($sales_Reports as $report)
				@php
					$ctr++;
				@endphp
				<tr style="border: 1px solid black; ">
					<td style="border: 1px solid black;">
           				<center>{{$ctr}}</center>
           			</td>
           			<td style="border: 1px solid black;">
           				<center>{{$report->strVarPartNum}}</center>
           			</td>
           			<td style="border: 1px solid black;">
           				<center>{{$report->strVarModel}}</center>
           			</td>
           			<td style="border: 1px solid black;">
           				<center>{{$report->decInventoryCost}}</center>
           				@php
           					$totalCost = $totalCost + $report->decInventoryCost;
           				@endphp
           			</td>
           			<td style="border: 1px solid black;">
           				<center>{{$report->intVarQty}}</center>
           			</td>
           			
					
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<div class="pull-right">
						
		<b>Total Cost :</b> <b style="font-size: 18px">{{$totalCost}}</b><br>
	</div>
	<br>
@endsection