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
    	return view('pages.contacts');
    }

    /*
     * Persist new contact to database
     */
    public function persist(ContactFormValidator $request)
    {
    	$user = Auth::user();
    	$validated = $request->validated();
    	$contact = Contact::create($validated);
    	$user->contacts()->attach($contact);
    	return $user->contacts;
    }
}
