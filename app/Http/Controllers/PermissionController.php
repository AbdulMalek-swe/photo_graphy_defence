<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{

    public function index(){
        $permissions = Permission::all();
        return view('dashboard.modules.permission.index', compact('permissions'));
    }

    public function create(){
        return view('dashboard.modules.permission.create');
    }

    public function store(Request $request)
    {
        try {
            Permission::create($request->all());
            return redirect()->route('permission.index');
        } catch (\Throwable $th) {
            return redirect()->route('permission.index')->with('error', 'something went wrong...!');
        }
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('dashboard.modules.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        try {
            $permission = Permission::find($id);
        $permission->update($request->all());
        return redirect()->route('permission.index')->with('success', 'Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('permission.index')->with('error', 'Someting Wrong');
        }
    }
}
