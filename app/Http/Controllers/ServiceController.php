<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use DB;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $servies = Service::all();
            return view('dashboard.modules.service.index', compact('servies'));
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
        return view('dashboard.modules.service.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Service::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = Service::query()->Image($request);
                $service = Service::create([
                    'name' => $request->name,
                    'image' => json_encode($image)
                ]);

                if (!empty($service)) {
                    DB::commit();
                    return redirect()->route('services.index')->with('success','Service Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $edit = Service::find($id);
        return view('dashboard.modules.service.createOrUpdate', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = Service::query()->Validation($request->all());
        if($validated){
            try{
                $update = Service::find($id);
                DB::beginTransaction();
                $reqImage = $request->image;
                if($reqImage){
                    $newimage = Service::query()->Image($request);
                }else{
                    $image = $update->image;
                }

                $serviceU = $update->update([
                    'name' => $request->name,
                    'image' => $reqImage ? json_encode($newimage) : $image,
                ]);

                if (!empty($serviceU)) {
                    DB::commit();
                    return redirect()->route('services.index')->with('success','Service Created successfully!');
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
            Service::find($id)->delete();
            return redirect()->route('services.index')->with('success','Service Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
