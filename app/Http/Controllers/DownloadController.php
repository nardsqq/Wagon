<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download() 
    {
    	$file= public_path(). "/Manual.pdf";

    	$headers = [
    		'Content-Type' => 'application/pdf',
    	];

    	return response()->download($file, 'Manual.pdf', $headers);
    }
}
