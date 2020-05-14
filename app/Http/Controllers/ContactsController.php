<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormValidator;

class ContactsController extends Controller
{
    public function index()
    {
    	return view('pages.contacts');
    }

    /*
     * Persist new contact to database
     */
    public function persist(ContactFormValidator $request)
    {
    	$validated = $request->validated();
    	return $validated;
    }
}
