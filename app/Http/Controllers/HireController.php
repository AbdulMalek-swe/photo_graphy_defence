<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{

    public function index()
    {
        if(Auth::user()->role_id == 2){
            $hires = Hire::where('user_id', Auth::id())->get();
            return view('dashboard.modules.hire.list', compact('hires'));
        }elseif(Auth::user()->role_id==3){
            $hires = Hire::where('photographer_id', Auth::id())->get();
            return view('dashboard.modules.hire.list', compact('hires'));
        }
    }

    public function store($title, $price, $user_id, $photographer_id){
        Hire::create([
        'title' => $title,
        'price' => $price,
        'photographer_id' => $photographer_id,
        'user_id' => $user_id,
        ]);
        return redirect()->route('home');
    }

    public function status($id){
        $model = Hire::where('hire_id',$id)->first();
        if($model->status == 0){
            $model->status = 1;
            $model->save();
            return back();
        }else{
            $model->status = 0;
            $model->save();
            return back();
        }
    }   

}