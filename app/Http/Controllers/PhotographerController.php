<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class PhotographerController extends Controller
{
    public function index(Request $request)
    {
        try {
            // $photos = Profile::where('role_id', 3)->get();
            $query = $request->input('query');

            // Fetch data based on the query
            $photos = Profile::where('role_id', 3)
                ->when($query, function ($q) use ($query) {
                    // Filter results if a query is provided
                    $q->where('title', 'LIKE', '%' . $query . '%')
                      ->orWhere('location', 'LIKE', '%' . $query . '%');
                })
                ->get();
            return view('user.photo.index', compact('photos','query'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
