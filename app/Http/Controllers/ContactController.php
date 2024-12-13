<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contact::all();
            return view('dashboard.modules.contact', compact('contacts'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function store(Request $request)
    {
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        return redirect('/');
    }

    public function destroy($id)
    {
        try {
            Contact::find($id)->delete();
            return redirect()->route('contact');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
