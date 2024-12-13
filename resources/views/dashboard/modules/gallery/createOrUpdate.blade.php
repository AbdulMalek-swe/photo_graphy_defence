@extends('layouts.dashboard.app')
@section('title', @$edit ? 'Gallery Update' : 'Gallery Create')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('dashboard_content')

    <div class="pagetitle">
        <h1>Gallery {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Gallery</li>
                <li class="breadcrumb-item active">Gallery {{ @$edit ? 'Update' : 'Create' }} Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-header">
            {{-- form validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- form validation errors end --}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Gallery {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('gallery.update', @$edit->gallery_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('gallery.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">
                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Gallery Title <span class="text-danger">*</span></label>
                    <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                        placeholder="type here Gallery Title">
                </div>

                <div class="col-md-6 col-lg-6 my-2">
                    <label for="" class="form-label">Gallery Image <span class="text-danger">*</span></label>
                    <input  type="file" name="image[]" multiple class="form-control">
                    @if (@$edit->image)
                        @php
                            $image = json_decode($edit->image);
                        @endphp
                        @if (empty($image))
                            <td>Image Not Selected</td>
                        @else
                            <td>
                                <div class="">
                                    <span>Already Selected Image: </span>
                                    <img class="zoom" src="{{ asset($image[0]) }}" height="50px" width="50px"
                                        alt="">
                                </div>
                            </td>
                        @endif
                    @endif
                </div>
            </section>
            <br><br><br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>



@section('js')
@endsection
@endsection