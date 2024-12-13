<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $edit = Profile::where('user_id', Auth::id())->first();
            
            if($edit){
                return view('dashboard.modules.profile.index', compact('edit'));
            }else{
                return view('dashboard.modules.profile.index');
            }
            
        } catch (\Throwable $th) {
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Profile::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = Profile::query()->Image($request);
                $gig = Profile::create([
                    'title' => $request->title,
                    'user_id' => Auth::id(),
                    'role_id' => Auth::user()->role_id,
                    'phone' => $request->phone,
                    'location' => $request->location,
                    'body' => $request->body,
                    'properties' => $request->properties,
                    'image' => json_encode($image)
                ]);

                if (!empty($gig)) {
                    DB::commit();
                    return redirect()->route('profiles.index')->with('success','Profile Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hire_me($id)
    {
        try {
            $show = Profile::find($id);
            $gigs = Gig::where('user_id', $show->user_id)->get();
            return view('user.photo.show',compact('show', 'gigs'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
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
        //
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
        $validated = Profile::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $profile = Profile::find($id);
                $reqImage = $request->image;
                if($reqImage){
                    $newimage = Profile::query()->Image($request);
                }else{
                    $image = $profile->image;
                }
                
                $profileU = $profile->update([
                    'title' => $request->title,
                    'user_id' => Auth::id(),
                    'role_id' => Auth::user()->role_id,
                    'phone' => $request->phone,
                    'location' => $request->location,
                    'body' => $request->body,
                    'properties' => $request->properties,
                    'image' => $reqImage ? json_encode($newimage) : $image,
                ]);

                if (!empty($profileU)) {
                    DB::commit();
                    return redirect()->route('profiles.index')->with('success','Profile Created successfully!');
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
        //
    }
}
