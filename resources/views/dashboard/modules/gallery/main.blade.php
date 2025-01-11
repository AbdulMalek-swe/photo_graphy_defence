@extends('layouts.user.app')

@section('title', 'Home')
@section('user_content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery</title>
        <!-- Include Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .gallery-container {
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
            }

            .gallery-card img {
                object-fit: cover;
                height: 200px;
                border-radius: 8px;
            }

            .gallery-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .gallery-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }
        </style>
    </head>

    <body>
        <div class="gallery-container">
            <h1 class="text-center mb-4">Gallery</h1>
            <div class="row g-4">
                @forelse ($galleries as $item)
                    @php
                        $image = json_decode($item->image);
                    @endphp
                    <div class="col-md-4 col-sm-6">
                        <div class="card gallery-card position-relative">
                            @if (!empty($image))
                                <img src="{{ asset($image[0]) }}" class="card-img-top" alt="{{ $item->title }}">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                    alt="No Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $item->title }}</h5>
                                <a class="d-flex justify-content-center align-items-center  ">
                                    <button type="button" class="btn btn-primary btn-lg">Order Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h2 class="text-center text-danger">Gallery is empty</h2>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
