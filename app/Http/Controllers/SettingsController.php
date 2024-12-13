<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SettingsController extends Controller
{
    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Something Went Wrong...!');
        }
    }
}
