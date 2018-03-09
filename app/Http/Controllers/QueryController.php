<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Client;

use App\Order;
use App\OrderStatus;
use App\OrderFooter;

class QueryController extends Controller
{
    public function clientQuery(Request $request)
    {
    	if($request->has('filter')) {
    		$query = Client::all();

    		return Datatables::of($query)
    		->make(true);
    	}
    	return view('queries.client.index');
    }

    public function orderQuery(Request $request)
    {
    	if($request->has('filter')) {
    		$query = Order::with('client');

    		return Datatables::of($query)
    		->editColumn('created_at', function ($query) {
                return $query->created_at->format('m/d/Y h:m A');
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at->format('m/d/Y h:m A');
            })
    		->make(true);
    	}
    	$clients = Client::all();
    	return view('queries.order.index')->with('clients', $clients);
    }
}
