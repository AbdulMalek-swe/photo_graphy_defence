@extends('layouts.user.app')
@section('title', 'Home')
@section('user_content')


<!--photogrpher start-->
<section class=" container my-5">
 <div class="hire">
     <h2 class="text-center title"> Our List Photographer</h2> <hr>
     <div class="row">
         @foreach ($photos as $photo)
         <div class="col-md-6 col-lg-6 col-12 col-sm-12 my-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4 hire-img">
                    @php
                    $image = json_decode($photo->image);
                    @endphp
                    @if (empty($image))
                        <td>Image Not Selected</td>
                    @else
                    <img src="{{ asset($image[0]) }}" class="img-fluid rounded-start" alt="...">
                    @endif
                   
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $photo->title }}</h5>
                      <p class="card-text">{{ $photo->body }}</p>
                        <a href="@route('hire.me',$photo->profile_id )" class="btn btn-sm btn-outline-success">Hire me</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
         @endforeach
        
     </div>
 </div>
</section>
<!--end photograper-->


@endsection