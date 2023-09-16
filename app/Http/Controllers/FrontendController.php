<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller
{
    public function contact(Request $request)
    {
        $results = $request->validate([
            'email' => 'required|email|min:5',
            'message' => 'required|min:5'
        ]);

        Contact::create([
            'email' => $results['email'],
            'message' => $results['message']
        ]);

        return Redirect::route('dashboard');
    }
}
