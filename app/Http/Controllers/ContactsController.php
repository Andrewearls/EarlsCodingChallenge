<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormValidator;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{

    public function index()
    {
    	$user = Auth::user();
    	return view('pages.contacts', [
    		'contacts' => $user->contacts,
    	]);
    }

    /*
     * Persist new contact to database
     */
    public function persist(ContactFormValidator $request)
    {
    	$user = Auth::user();
    	$validated = $request->validated();
    	$contact = $user->contacts()->create($validated);
    	
    	return redirect()->route('contacts');
    }
}
