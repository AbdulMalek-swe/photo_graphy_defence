@extends('layouts.dashboard.app')
@section('title', 'List Of Service')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('dashboard_content')

    <div class="pagetitle">
        <h1>Hire Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Hire Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <x-notification></x-notification>
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Hire Table</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Hire Name</th>
                                    <th scope="col">Hire Email</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hires as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ Auth::user()->role_id == 2 ? $item->photographer ? $item->photographer->name : "" : $item->user ? $item->user->name : "" }}</td>
                                        <td>{{ Auth::user()->role_id == 2 ? $item->photographer ? $item->photographer->email : "" : $item->user ? $item->user->email : "" }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td class="form-inline">
                                            @if ($item->status == 0)
                                                <a class="badge bg-danger text-light" href="{{ Auth::user()->role_id == 3 ? url('hire/status', $item->hire_id) :'' }}">NO-Accept</a>
                                            @else 
                                                <a class="badge bg-success text-light" href="">Accept</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">Hire Is empty</h2>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    @section('js')
    @endsection

@endsection