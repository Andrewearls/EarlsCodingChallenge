<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CSVFormValidator as Validator;
use Illuminate\Support\Facades\Auth;
use App\CSVFile;
use App\Contact;
use App\Jobs\ProcessCsvFile;

class CSVController extends Controller
{
    public function index()
    {
    	return view('pages.csvImport');
    }

    public function persist(Validator $request)
    {
    	$validated = $request->validated();
    	$user = Auth::user();
    	$file = $request->file('csv');
    	$fileData = array();

        //sanitize csv file
    	if (($handle = fopen($file, "r")) !== FALSE) {
    			while (($data = fgetcsv($handle, count(file($file)), ",")) !== FALSE) {
    				$fileData[] = $data;
    			}
    	}

    	$user->files()->create([
    			'name' => $request->file('csv')->getClientOriginalName(),
    			'data' => serialize($fileData),
    	]);

    	return redirect()->route('contacts');
    }
}
