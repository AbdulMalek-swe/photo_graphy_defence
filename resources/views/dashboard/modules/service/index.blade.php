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
        <h1>Service Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Service Table</li>
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
                        <h5 class="card-title">Service Table</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($servies as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        @php
                                            $image = json_decode($item->image);
                                        @endphp
                                        @if (empty($image))
                                            <td>Image Not Selected</td>
                                        @else
                                            <td><img class="zoom" src="{{ asset($image[0]) }}" height="50px"
                                                    width="50px" alt=""> </td>
                                        @endif

                                        
                                        <td class="form-inline">
                                           
                                            <a class="btn btn-sm btn-primary" href="@route('services.edit', $item->service_id)"> Edit</a>
                                            <form method="POST" action="@route('services.destroy',$item->service_id)">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-sm btn-danger" type="submit"> Delete</button>
                                            </form>


                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">Service Is empty</h2>
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