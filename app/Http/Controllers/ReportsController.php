<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Stock;

class ReportsController extends Controller
{
    private function filterDate(Request $request, $query, $column = 'created_at'){
        $start = $request->startDate;
        $end = $request->endDate;
        return $query->whereRaw("$column between ? AND ?", [$start, $end]);
    }

    public function index(Request $request){
    	return view('reports.sales_report');
    }

    public function inventory(Request $request){
        if($request->has('filter')){
            $table = Stock::selectRaw("
                DATE(created_at) AS date,
                SUM(
                    SELECT SUM(int_quantity) FROM tbl_stock WHERE created_at <= {$request->startDate} GROUP BY int_stock_var_id_fk
                ) AS start,
                SUM(CASE WHEN int_quantity > 0 THEN int_quantity ELSE 0 END) AS in,
                SUM(CASE WHEN int_quantity < 0 THEN int_quantity ELSE 0 END) AS out,
                SUM(
                    SELECT SUM(int_quantity) FROM tbl_stock WHERE created_at <= {$request->endDate} GROUP BY int_stock_var_id_fk
                ) AS end
            ")
            ->groupBy(DB::raw('int_stock_var_id_fk'))
            ->groupBy(DB::raw('DATE(created_at)'));
            return Datatables::of($table)
            ->filter(function ($query) use($request){
                $this->filterDate($request, $query);
            })
            ->make(true);
        }

        return view('reports.inventory');
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
