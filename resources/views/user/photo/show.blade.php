@extends('layouts.user.app')
@section('title', 'Hire Me')
@section('user_content')

    <section class="container my-5">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Photographer Photo</h3>
                    </div>
                    <div class="card-body">
                        @php
                        $image = json_decode($show->image);
                    @endphp
                    @if (empty($image))
                        Image Not Selected
                    @else
                        <img height="200px" class="" src="{{ asset($image[0]) }}" height="50px"
                                 alt=""> 
                    @endif
                
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Photographer Info</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Name: </strong>{{ $show->user ? $show->user->name : '' }}</p>
                        <p><strong>Email: </strong>{{ $show->user ? $show->user->email : '' }}</p>
                        <p><strong>Phone: </strong>{{ $show->phone }}</p>
                        <p><strong>Title: </strong>{{ $show->title }}</p>
                        <p><strong>Location: </strong>{{ $show->location }}</p>
                        <p><strong>Body: </strong>{{ $show->body }}</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Gig List</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($gigs as $item)
                            <div class="col-md-4 col-lg-4 col-sm-12 my-4">
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

        <div class="row my-5">
            <h3 class="text-center">Pricing</h3>
            @foreach ($show->properties as $p)
                <div class="col-md-4 col-lg-4 col-sm-12">
                    @if ($p['title'] != null)
                    <div class="card" style="width: 18rem;">
                        @php
                        $image = json_decode($show->image);
                        @endphp
                        @if (empty($image))
                            Image Not Selected
                        @else
                            <img width="100%" height="200px" class="" src="{{ asset($image[0]) }}" 
                                    alt=""> 
                        @endif
                        <div class="card-body">
                        <h5 class="card-title">{{ $p['title'] }} || {{ $p['price'] }}</h5>
                        <p class="card-text">{{ $p['description'] }}.</p>
                        
                        {{-- <a class="btn btn-success" href="{{route('photographer.hire',['title'=>$p['title'], 'price'=>$p['price'],'user_id'=>Auth::id(), 'photographer_id'=>$show->user_id])}}">Hire Me</a> --}}
                        <button class="btn btn-success hire-btn" onclick="confirmAction()">Hire Me</button>

                        <script>
                            function confirmAction() {
                                const userConfirmed = confirm("Are you sure you want to hire?");
                                if (userConfirmed) {
                                    window.location.href = '/'; // Redirect to the home page
                                } else {
                                    // Do nothing
                                }
                            }
                        </script>
                    </div>
                    </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

@endsection