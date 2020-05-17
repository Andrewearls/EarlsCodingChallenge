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

    	// $file = $request->file('csv');
    	// $fileData = array();
    	// if (($handle = fopen($file, "r")) !== FALSE) {
    	// 		while (($data = fgetcsv($handle, count(file($file)), ",")) !== FALSE) {
    	// 			$fileData[] = $data;
    	// 		}
    	// }

    	// $csv = CSVFile::create([
    	// 		'name' => $request->file('csv')->getClientOriginalName(),
    	// 		'data' => serialize($fileData),
    	// ]);

    	$file = CSVFile::find(1)->first();

    	foreach ($fileData as $row) {
    		if (!filter_var($row[1], FILTER_VALIDATE_EMAIL)) {
			  	continue;
			} elseif (!is_numeric($row[2])) {
				continue;
			}
    		Contact::create([
    			'first_name' = $row[0],
    			'email' = $row[1],
    			'phone' = $row[2],
    ]);
    	}




    	return is_numeric(unserialize($file->data)[1][2]);
    }
}
