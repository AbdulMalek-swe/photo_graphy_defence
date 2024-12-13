@if (url()->current() == 'http://localhost:8000')
<section>
    <section class="nav-wrap">
         <!--navbar start-->
         <nav class="navbar navbar-expand-lg">
             <div class="container-fluid container">
             <a class="navbar-brand nav-title" href="{{ url('/') }}">Photolancer</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link active" href="{{ url('more/photographer') }}">Photographer</a>
                 </li>
                 <li class="nav-item text-light">
                    <a class="nav-link text-light" href="{{ url('/') }}#contact">Contact</a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ url('/') }}#about">About</a> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#gallery">Gallery</a>
                </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Profile
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Auth::check())
                        <li><a class="dropdown-item" href="@route('home')">Dashboard</a></li>
                        @else
                        <li><a class="dropdown-item" href="@route('login')">Login</a></li>
                        <li><a class="dropdown-item" href="@route('register')">Register</a></li>
                        @endif
                     </ul>
                 </li>
                 </ul>
             </div>
             </div>
         </nav>
         <!--navbar end-->
         <!--banner area start-->
         
         <section class=" my-5">
             <div class="row justify-content-center">
                 <div class="col-md-8 banner">
                     <p class="banner-title"><span>the Creative Photo agency</span></p>
                     <h2 class="text-center">Lound apperarance for your brand</h2>
                     <p class="text-center">Get Started. Build a memorable photography website with designer-made templates and a variety of dedicated features. Showcase your work with a photography portfolio, client galleries and an </p>
                     <div class="text-center">
                         <a href="{{ url('more/photographer') }}" class="btn btn-outline-success">Hire photographer</a>
                     </div>
                 </div>
             </div>
         </section>
        
         <!--banner end here-->
     </section>
</section>
@else 
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid container">
    <a class="navbar-brand nav-title text-light" href="{{ url('/') }}">Photolancer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ url('more/photographer') }}">Photographer</a>
        </li>
        <li class="nav-item">
           <a class="nav-link text-light" href="{{ url('/') }}#contact">Contact</a>
       </li>
       <li class="nav-item">
           {{-- <a class="nav-link text-light" href="{{ url('/') }}#about">About</a> --}}
       </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               @if (Auth::check())
               <li><a class="dropdown-item" href="@route('home')">Dashboard</a></li>
               @else
               <li><a class="dropdown-item" href="@route('login')">Login</a></li>
               <li><a class="dropdown-item" href="@route('register')">Register</a></li>
               @endif
            </ul>
        </li>
        </ul>
    </div>
    </div>
</nav>
@endif