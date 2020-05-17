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

    	$file = $request->file('csv');
    	$fileData = array();
    	if (($handle = fopen($file, "r")) !== FALSE) {
    		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    			$fileData[] = implode(',', $data);
    			// $row++;
    		}
    	}

    	$csv = CSVFile::Create(
    		'name' => $request->file('csv')->getClientOriginalName(),
    		'data' => implode('\n', $fileData),
    	]);

    	return CSVFile::all();
    }
}
