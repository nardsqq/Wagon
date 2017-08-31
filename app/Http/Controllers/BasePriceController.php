<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BasePrice;
use App\Item;

class BasePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = BasePrice::orderBy('intPriceID')->get();
        $items = Item::orderBy('intItemID')->get();
        return view('maintenance.base-price.index')->with('prices', $prices)->with('items', $items);
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
        if ($request->ajax()) {
            $this->validate($request, BasePrice::$rules);
            $item = Item::find($request->intP_Item_ID);

            $price = new BasePrice;
            $price->items()->associate($item);
            $price->decPriceAmount = trim($request->decPriceAmount);

            $price->save();
            return response()->json($price);
        } else {
            return redirect(route('base-price.index'));
        }
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
        $price = BasePrice::findOrFail($id);
        return response()->json($price);
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
        if ($request->ajax()) {
            $item = Item::find($request->intP_Item_ID);
            $price = BasePrice::findOrFail($id);

            $price->item()->associate($item);
            $price->decPriceAmount = trim($request->decPriceAmount);

            $price->save();
            return response()->json($price);
        } else {
            return redirect(route('base-price.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($request->ajax()) {
            $del = [];
            $request->has('values') ? $del = $request->values : array_push($del, $id);
            $price = BasePrice::destroy($del);

            return response()->json($price);
        } else {
            return redirect(route('base-price.index'));
        } 
    }
}
