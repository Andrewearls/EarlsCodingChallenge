<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSVController extends Controller
{
    public function index()
    {
    	return view('pages.csvImport');
    }

    public function persist(Request $request)
    {
    	return $request;
    }
}
