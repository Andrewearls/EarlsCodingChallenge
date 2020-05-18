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
       
    	$user->files()->create([
    			'name' => $request->file('csv')->getClientOriginalName(),
    			'data' => serialize(file($file)),
    	]);

    	return redirect()->route('contacts');
    }
}
