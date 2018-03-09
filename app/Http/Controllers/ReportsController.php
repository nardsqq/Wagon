<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index(Request $request){
    	return view('reports.sales_report');
    }

    public function inventory(Request $request){
      return view('reports.inventory_pdf');
    }

    public function salesReportPDF(Request $request){
    	//return $request->toArray();
    	$sales_Reports = DB::table('tblvariant')
    		//->whereBetween('tblvariant.created_at', [$request->startFrom, $request->endTo])
    		->get();

    	$salesReport = PDF::loadView('reports.sales_report_pdf',
                    [
                      'start' => $request->startFrom,
                      'end' => $request->endTo,
                      'sales_Reports' => $sales_Reports
                      
                    ])->setPaper('a4', 'landscape');
      return $salesReport->stream('Sales Report.pdf');
    }
}
