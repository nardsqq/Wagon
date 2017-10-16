<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\VehicleRequest;

class PDFController extends Controller
{
    public function vehireq($id)
    {
        $vehireq = VehicleRequest::findOrFail($id);

        $pdf = PDF::loadView('pdf.vehicle-request-pdf', compact('vehireq'));
        return $pdf->stream();
    }
}
