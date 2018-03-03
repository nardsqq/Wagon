<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discs = Discount::orderBy('str_discount_name')->get();
        return view('maintenance.discount.index')->with('discs', $discs);
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
            $this->validate($request, Discount::$rules);
            $disc = new Discount;
            $disc->str_discount_name = trim(ucwords($request->str_discount_name));
            $disc->int_discount_percentage = trim($request->int_discount_percentage);
            $disc->save();
            
            return response()->json($disc);
        } else {
            return redirect(route('discount.index'));
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
        $disc = Discount::findOrFail($id);
        return response()->json($disc);
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
            $disc = Discount::findOrFail($id);
            $disc ->str_discount_name = trim($request->str_discount_name);
            $disc ->int_discount_percentage = trim($request->int_discount_percentage);
            $disc->save();
            
            return response()->json($disc);
        } else {
            return redirect(route('discount.index'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $del = [];
            $request->has('values') ? $del = $request->values : array_push($del, $id);
            $disc = Discount::destroy($del);

            return response()->json($disc);
        } else {
            return redirect(route('discount.index'));
        }
        
    }
}
