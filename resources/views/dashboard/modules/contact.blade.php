@extends('layouts.dashboard.app')
@section('title', 'List Of Contact')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('dashboard_content')

    <div class="pagetitle">
        <h1>Contact Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Contact Table</li>
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
                        <h5 class="card-title">Contact Table</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Message</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->message }}</td>
                                        
                                        <td class="form-inline">
                                           
                                            
                                           


                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">Contact Is empty</h2>
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