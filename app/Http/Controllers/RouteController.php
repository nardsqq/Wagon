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

    public function quotation()
    {
      return view('transactions.quotation.index');
    }

    public function purchaseorder()
    {
      return view('transactions.purchase-order.index');
    }

    public function salesorder()
    {
      return view('transactions.sales-order.index');
    }

    public function joborder()
    {
      return view('transactions.job-order.index');
    }

    public function invoice()
    {
      return view('transactions.invoice.index');
    }

    public function receive()
    {
      return view('transactions.receive-items.index');
    }

    public function perz()
    {
      return view('queries.personnel.index');
    }

    public function servz()
    {
      return view('queries.service-area.index');
    }

    public function varz()
    {
      return view('queries.variants.index');
    }

    public function setDeliverySchedule() {
      return view('transactions.delivery.index');
    }
}
