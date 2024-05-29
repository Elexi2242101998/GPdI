@extends('frontend.layout.main')

@section('content')
    <div class="hero-slider">
        <div class="slider-item th-fullpage hero-area"
            style="background-image: url({{ asset('assets-fe/assets/theme/images/persembahann.png') }});width: 100%; height: 600px;">
            <div class="container">
                <div class="col-md-12 text-center">
                    <h1 data-duration-in=".5" data-animation-in="fadeInUp" data-delay-in=".1"
                        style="font-size: 128px; font-family: 'Zen Antique Soft', sans-serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                        <span
                            style="font-size: 96px; font-family: 'Cormorant Garamond', serif; font-weight: normal; margin-bottom: 10px;">OFFERING</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="persembahan" id="persembahan">
        <div class="container">
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                <div class="close-btn" onclick="togglePopup()">&times;
                </div>
                <h1>Title</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aspernatur laborum rem sed laudantium excepturi veritatis voluptatum architecto, dolore quaerat totam officiis nisi animi accusantium alias inventore nulla atque debitis.</p>
                </div>
                </div>
                <button onclick="togglePopup()">Show Popup</button>
        </div>
    </div>
@endsection
