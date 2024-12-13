@extends('layouts.dashboard.app')
@section('title', @$edit ? 'Profile Update' : 'Profile Create')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('dashboard_content')

    <div class="pagetitle">
        <h1>Profile {{ @$edit ? 'Update' : 'Create' }} Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Profile</li>
                <li class="breadcrumb-item active">Profile {{ @$edit ? 'Update' : 'Create' }} Form</li>
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
            <h5 class="card-title">Profile {{ @$edit ? 'Update' : 'Create' }} Form</h5>
            @if (@$edit)
                <form action="@route('profiles.update', @$edit->profile_id)" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="@route('profiles.store')" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <section class="form-group row">

                <div class="col-md-8 col-lg-col-12">
                    <h2>Your Profile Update</h2>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 my-2">
                            <label for="" class="form-label">Profile Title <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" name="title" value="{{ @$edit->title }}"
                                placeholder="type here Profile title">
                        </div>
        
                        <div class="col-md-12 col-lg-12 my-2">
                            <label for="" class="form-label">Profile Phone <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" name="phone" value="{{ @$edit->phone }}"
                                placeholder="type here Profile Phone">
                        </div>

                        <div class="col-md-12 col-lg-12 my-2">
                            <label for="" class="form-label">Location <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" name="location" value="{{ @$edit->location }}"
                                placeholder="type here Profile Location">
                        </div>

                        <div class="col-md-12 col-lg-12 my-2">
                            <label for="" class="form-label">Body <span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" name="body" value="{{ @$edit->body }}"
                                placeholder="type here Profile Body">
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-12">
                    <h2>Profile Image</h2>
                    <div class="col-md-12 col-lg-12 my-2">
                        <label for="" class="form-label">Profile Image <span class="text-danger">*</span></label>
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
                </div>




                <div class="col-md-12 col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2>Your Price</h2>
                            <div class="form-group">
                                <label for="properties">Priceing</label>
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        title:
                                    </div>
                                    <div class="col-md-4">
                                        price:
                                    </div>
                                    <div class="col-md-4">
                                        description:
                                    </div>
                                </div>
                                @for ($i=0; $i <= 4; $i++)
                                <div class="row">
                                    
                                    <input type="text" hidden name="properties[{{ $i }}][id]" class="form-control" value="{{$i}}">
                                    <div class="col-md-4">
                                        <input type="text" name="properties[{{ $i }}][title]" class="form-control" value="{{ @$edit->properties[$i]['title'] ?? '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="properties[{{ $i }}][price]" class="form-control" value="{{ @$edit->properties[$i]['price'] ?? '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="properties[{{ $i }}][description]" class="form-control" value="{{ @$edit->properties[$i]['description'] ?? '' }}">
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
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