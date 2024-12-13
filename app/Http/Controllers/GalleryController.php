<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $galleries = Gallery::all();
            return view('dashboard.modules.gallery.index', compact('galleries'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.modules.gallery.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Gallery::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = Gallery::query()->Image($request);
                $Gallery = Gallery::create([
                    'title' => $request->title,
                    'image' => json_encode($image)
                ]);

                if (!empty($Gallery)) {
                    DB::commit();
                    return redirect()->route('gallery.index')->with('success','Gallery Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Gallery::find($id)->delete();
            return redirect()->route('gallery.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
