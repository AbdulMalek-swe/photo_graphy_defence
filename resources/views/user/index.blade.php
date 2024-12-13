@extends('layouts.user.app')
@section('title', 'Home')
@section('user_content')
      <!--serivce start-->
   <section class="">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="my-5 service">Our Services</h2> 
             <div class="row">
                 @foreach ($servies as $s)
                 <div class="col-md-4 col-lg-4 col-sm-12 my-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="service-img">
                                @php
                                    $image = json_decode($s->image);
                                @endphp
                                @if (empty($image))
                                    <td>Image Not Selected</td>
                                @else
                                <img class="button" src="{{ asset($image[0]) }}" alt="">
                                @endif
                               
                                <p class="lead my-3">{{ $s->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                 @endforeach
             </div>
        </div>
    </div>
</section>
<!--end service-->

<!--photogrpher start-->
<section class=" container my-5">
 <div class="hire">
     <h2 class="text-center title"> Pupolar Photographer</h2>
     <div class="row">
         @foreach ($photos as $photo)
         <div class="col-md-6 col-lg-6 col-12 col-sm-12 my-3">
            <div class="card mb-3" style="max-width: 540px; height:300px">
                <div class="row g-0"> 
                  <div class="col-md-4 hire-img">
                    @php
                    $image = json_decode($photo->image);
                    @endphp
                    @if (empty($image))
                        <td>Image Not Selected</td>
                    @else
                    <div class="h-100 overflow-hidden">
                        <img src="{{ asset($image[0]) }}" class="img-fluid rounded-start h-100 bg-warning" alt="...">
                    </div>
                   
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
     <div class="float-right">
         <a class="btn btn-outline-dark float-right hire-btn" href="@route('more.photographer')">More Photographer</a>
     </div>
 </div>
</section>
<!--end photograper-->


<!--about us start -->
{{-- <section>
    <h2>About-us</h2>
    <div class="row">
        <div class="col-md-5 col-lg-5 col-sm-12">
            <img src="" alt="">
        </div>
        <div class="col-md-7 col-lg-7 col-sm-12"></div>
    </div>
</section> --}}
<!--about us end -->



<!--contact start-->
<section class="my-5 container" id="contact">
    <h2 class="text-center title"> Contact-us</h2>
 <section class="row">
     <div class="col-md-6 col-lg-6 col-sm-12 col-12">
         <div class="contact">
             <h1 class="title ">GET IN TOUCH</h1><hr>
             <p>Create a free website with Photolancer. Customize with Photolancer' free website builder,Showcase your portfolio in creative
                 layouts, like Grid, Slider, Strip, and more.</p>
             <div class="my-2">
                 <p><strong><i class="fas fa-phone-alt"></i></strong> +88018873121</p>
                 <p><strong><i class="fas fa-envelope"></i></strong> Test@gmail.com</p>
                 <p><strong><i class="fas fa-location-arrow"></i></strong> Dhaka Bangladesh</p>
             </div>
         </div>
     </div>
     <div class="col-md-6 col-lg-6 col-sm-12 col-12">
         <form action="@route('contact.store')" method="post">
            @csrf
             <div class="form-group my-2">
                 <label for="">Name</label>
                 <input type="text" class="form-control" placeholder="Name" name="name" id="">
             </div>
             <div class="form-group my-2">
                 <label for="">Email</label>
                 <input type="text" class="form-control" placeholder="E-mail" name="email" id="">
             </div>
             <div class="form-group my-2">
                 <label for="">Message</label>
                 <textarea name="message" class="form-control" id="" cols="10" rows="4"></textarea>
             </div>
             <div class="text-center">
                 <input type="submit" class="btn  hire-btn btn-outline-dark">
             </div>
         </form>
     </div>
 </section>
</section>
<!--contact end-->

<!--photo gallery start-->
<section class="my-5 container" id="gallery">
    <div class="gallery">
         <h2 class="text-center title"> Photo Gallery</h2>
    </div>
    <div class="row">
         <div class="col-md-4 my-2">
             <img width="100%" src="{{asset('user')}}/banner.jpg" alt="">
         </div>
         <div class="col-md-4 my-2">
             <img width="100%" src="{{asset('user')}}/banner-1.jpeg" alt="">
         </div>
         <div class="col-md-4 my-2">
             <img width="100%" src="{{asset('user')}}/banner-2.jpeg" alt="">
         </div>
         <div class="col-md-4 my-2">
             <img width="100%" src="{{asset('user')}}/banner-3.jpeg" alt="">
         </div>
         <div class="col-md-4 my-2">
             <img width="100%" src="{{asset('user')}}/banner-4.jpeg" alt="">
         </div>
         <div class="col-md-4 my-2">
             <img width="100%" src="{{asset('user')}}/banner-5.jpeg" alt="">
         </div>
    </div>
</section>
<!--photo gallery end-->
@endsection