@extends('layouts.dashboard.app')

    @section('title', 'Permission List')

    @section('dashboard_content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @isset(auth()->user()->role->permission['permission']['permission']['add'])
                <a class="btn btn-success text-light" href="@route('permission.create')">Create Permission </a>
                @endisset
                <h2 class="text-center">Permissions</h2>
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$permission->role->name}}</td>
                                <td>
                                    
                                    <a class="btn btn-info" href="@route('permission.edit',$permission->id)">Edit</a>
                                   
                                    <a class="btn btn-danger" href="">Delete</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection

    @section('js')
    @endsection
