<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Response;
use DB;

class ClientController extends Controller
{
    public function checkbox($id)
    {
        $client = Client::find($id);
        if($client->isActive) {
            $client->isActive=0;
        }
        else {
            $client->isActive=1;
        }
        $client->save();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = DB::table('tblClient')
        ->select('tblClient.*')
        ->where('isDeleted','=',0)
        ->get();
        return view('transactions.client.index')->withClient($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
        $client->strClientName = trim(strtoupper($request->strClientName));
        $client->strClientAddress = trim($request->strClientAddress);
        $client->strClientTelephone = trim($request->strClientTelephone);
        $client->strClientFax = trim($request->strClientFax);
        $client->strClientEmail = trim($request->strClientEmail);
        $client->strClientMobile = trim($request->strClientMobile);
        $client->save();
        return Response::json($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return Response::json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->strClientName = trim(strtoupper($request->strClientName));
        $client->strClientAddress = trim($request->strClientAddress);
        $client->strClientTelephone = trim($request->strClientTelephone);
        $client->strClientFax = trim($request->strClientFax);
        $client->strClientEmail = trim($request->strClientEmail);
        $client->strClientMobile = trim($request->strClientMobile);
        $client->save();
        return Response::json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->isDeleted = 1;
        $client->isActive = 0;
        $client->save();
        return Response::json($client);
    }
}
