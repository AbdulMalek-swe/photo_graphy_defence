<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class PhotographerController extends Controller
{
    public function index()
    {
        try {
            $photos = Profile::where('role_id', 3)->get();
            return view('user.photo.index', compact('photos'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
