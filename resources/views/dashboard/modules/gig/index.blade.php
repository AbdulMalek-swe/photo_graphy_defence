@extends('layouts.dashboard.app')

    @section('title', 'Permission List')

    @section('dashboard_content')
    <section class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Gig {{ @$edit ? 'Update' : 'Create' }}</h3>
                        @if (@$edit)
                            <form action="" enctype="multipart/form-data" method="POST">
                        @else 
                            <form action="@route('gigs.store')" enctype="multipart/form-data" method="POST">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" value="{{ @$edit->title }}" name="title" id="">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Service Image <span class="text-danger">*</span></label>
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
                       
                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea class="form-control" name="body" id="" cols="10" rows="4">
                                {{ @$edit->body }}
                            </textarea>
                        </div>

                        <div class="text-center form-group">
                            <input type="submit" class="btn btn-sm btn-success" name="" value="Submit" id="">
                        </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gig List</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($gigs as $item)
                            <div class="col-md-6 col-lg-6 col-sm-12 my-4">
                                <div class="card" style="width: 18rem;">
                                    @php
                                            $image = json_decode($item->image);
                                        @endphp
                                        @if (empty($image))
                                            Image Not Selected
                                        @else
                                            <img height="200px" class="" src="{{ asset($image[0]) }}" height="50px"
                                                     alt=""> 
                                        @endif
                                    
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $item->title }}</h5>
                                      <p class="card-text">{{ $item->body }}.</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

    @section('js')
    @endsection
