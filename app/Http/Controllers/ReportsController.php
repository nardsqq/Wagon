<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Stock;
use App\Variant;

class ReportsController extends Controller
{
    private function filterDate(Request $request, $query, $column = 'created_at'){
        $start = $request->startDate;
        $end = $request->endDate;
        return $query->whereRaw("DATE($column) between ? AND ?", [$start, $end]);
    }

    public function index(Request $request){
    	return view('reports.sales_report');
    }

    public function inventory(Request $request){
        if($request->has('filter')){
            
            $start = $request->startDate;
            $end = $request->endDate;
            $table = Variant::with('product');
            return Datatables::of($table)
            ->filter(function ($query) use($request){
                $this->filterDate($request, $query);
            })
            ->addColumn('in', function($query) use($start, $end) {
                return $query->stocks()
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('int_quantity', '>',0)
                ->sum('int_quantity') ?: 0;
            })
            ->addColumn('out', function($query) use($start, $end) {
                return $query->stocks()
                ->whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('int_quantity', '<',0)
                ->sum('int_quantity') * -1 ?: 0;
            })
            ->addColumn('start', function($query)  use($start, $end){
                // return App\Stock::where('int_stock_var_id_fk', $variant->int_var_id)->where('created_at', '<=', $start)->sum('int_quantity') ?: 0;
                return $query->stocks()->whereDate('created_at', '<=', $start)->sum('int_quantity') ?: 0;
            })
            ->addColumn('end', function($query) use($start, $end) {
                return $query->stocks()->whereDate('created_at', '<=', $end)->sum('int_quantity') ?: 0;
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
