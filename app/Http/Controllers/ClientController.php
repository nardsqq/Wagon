<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('strClientName')->get();
        return view('transactions.client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $clients = Client::orderBy('strClientName')->get();

        return view('transactions.client.create')->with('clients', $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Client::$rules);
        $client = new Client;
        $client->strClientName = trim($request->strClientName);
        $client->strClientAddLotNum = trim($request->strClientAddLotNum);
        $client->strClientAddStreet = trim($request->strClientAddStreet);
        $client->strClientAddBrgy = trim($request->strClientAddBrgy);
        $client->strClientAddCity = trim($request->strClientAddCity);
        $client->strClientAddProv = trim($request->strClientAddProv);
        $client->strClientTelephone = trim($request->strClientTelephone);
        $client->strClientFax = trim($request->strClientFax);
        $client->strClientMobile = trim($request->strClientMobile);
        $client->strClientEmailAddress = trim($request->strClientEmailAddress);
        $client->strClientTIN = trim($request->strClientTIN);
      

        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        
        return view('transactions.client.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('transactions.client.edit')->with('client', $client);
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
        $client = Client::findOrFail($id);
        $client->strClientName = trim($request->strClientName);
        $client->strClientAddLotNum = trim($request->strClientAddLotNum);
        $client->strClientAddStreet = trim($request->strClientAddStreet);
        $client->strClientAddBrgy = trim($request->strClientAddBrgy);
        $client->strClientAddCity = trim($request->strClientAddCity);
        $client->strClientAddProv = trim($request->strClientAddProv);
        $client->strClientTelephone = trim($request->strClientTelephone);
        $client->strClientFax = trim($request->strClientFax);
        $client->strClientMobile = trim($request->strClientMobile);
        $client->strClientEmailAddress = trim($request->strClientEmailAddress);
        $client->strClientTIN = trim($request->strClientTIN);


        $client->save();

        return redirect(route('client.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $del = [];
        $request->has('values') ? $del = $request->values : array_push($del, $id);
        $client = Client::destroy($del);

        return response()->json($client);
    }
}
