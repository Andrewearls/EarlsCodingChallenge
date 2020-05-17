<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CSVFormValidator as Validator;

class CSVController extends Controller
{
    public function index()
    {
    	return view('pages.csvImport');
    }

    public function persist(Validator $request)
    {
    	$validated = $request->validated();
    	return $validated;
    }
}
