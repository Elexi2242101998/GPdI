@extends('frontend.layout.main')

@section('content')
<section class="single-page-header"
        style="background-image: url({{ asset('assets-fe/assets/theme/images/about/gambarsek1.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Services</h2>
            </div>
        </div>
    </div>
</section>

<div class="col-sm-6 mx-auto" style="padding: 15px;">
    <div class="position-relative">
        <img src="{{ asset('assets-fe/assets/theme/images/about/j1.jpg') }}" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: auto;" alt="">
        <a href="https://www.youtube.com/watch?v=LYPXSnlyVM4" target="_blank" class="play-button-wrapper" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.5);">
            <button type="button" class="btn btn-play" style="color: white; background-color: transparent; border: none; font-size: 50px;">
                <i class="bi bi-play-fill"></i>
            </button>
        </a>
    </div>
</div>


@endsection