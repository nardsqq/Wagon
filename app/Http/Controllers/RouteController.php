<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
	public function index()
	{
	  return redirect()->route('admin.dashboard');
	}

    public function admin()
    {
      return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
      return view('admin.index');
    }

    public function maintenance()
    {
      return view('maintenance.index');
    }

    public function transactions()
    {
      return view('transactions.index');
    }
}
