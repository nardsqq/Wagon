<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\VehicleRequest;
use App\Quotation;
use App\QuotationProduct;
use App\QuotationService;
use App\Client;
use App\Personnel;
use App\ProductType;
use App\Product;
use App\Brand;

class PDFController extends Controller
{
    public function vehireq($id)
    {
        $vehireq = VehicleRequest::findOrFail($id);

        $pdf = PDF::loadView('pdf.vehicle-request-pdf', compact('vehireq'));
        return $pdf->stream();
    }

    public function quote($id)
    {
        $quote = Quotation::findOrFail($id);

        $pdf = PDF::loadView('pdf.quotation-pdf', compact('quote'));
        return $pdf->stream();
    }
}
