<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'text' => ['required', 'string'],
        ]);

        $contact = Contact::create($request->all());

        return $contact;
    }
}
