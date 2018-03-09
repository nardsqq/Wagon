<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Client;

class QueryController extends Controller
{
    public function clientQuery()
    {
    	if($request->has('filter')) {
    		$query = Client::all();

    		return Datatables::of($query);
    		->make(true);
    	}
    	return view('queries.client.index');
    }
}
