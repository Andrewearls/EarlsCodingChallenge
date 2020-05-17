<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CSVFormValidator as Validator;
use App\CSVFile;

class CSVController extends Controller
{
    public function index()
    {
    	return view('pages.csvImport');
    }

    public function persist(Validator $request)
    {
    	$validated = $request->validated();
    	// dd($request->file('csv')->getClientOriginalName());
    	$csv = CSVFile::create([
    		'name' => $request->file('csv')->getClientOriginalName(),
    		'data' => $request->file('csv'),
    	]);
    	return CSVFile::all();
    }
}
