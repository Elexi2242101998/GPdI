@extends('frontend/layout/main')

@section('content')

<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('assets-fe/assets/theme/images/home/home3.jpeg') }});">
        <div class="container">
            <div class="col-md-12 text-center">
                <h1 data-duration-in=".5" data-animation-in="fadeInUp" data-delay-in=".1" style="font-size: 128px; font-family: 'Zen Antique Soft', sans-serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
                    <span style="font-size: 96px; font-family: 'Cormorant Garamond', serif; font-weight: normal; margin-bottom: 10px;">WELCOME TO</span> <br>
                    <span style="font-size: 64px; font-family: 'Cormorant Garamond', serif; font-weight: normal; margin-top: -10px;">GPdI Bethany Pekanbaru</span>
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center" style="background-color: black; color: white; padding: 50px 0;">
        </div>
    </div>
</div>

<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-color: beige">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{route('storage',$home->gambar)}}" alt="Image" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center" style="background-color: #134A6D; color: white; padding: 30px 0;">
            <h2 style="font-size: 36px; margin: 0;">Be Closer To Us</h2>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 20px;">
    <div class="row">
        <div class="col-md-6" style="padding: 70px;">
            <h1 style="font-size: 34px; font-weight: bold; padding: 10px; color: #134A6D;">GPdI Bethany Pekanbaru</h1>
            <hr style="border: none; border-top: 4px solid #134A6D; width: calc(50% + 0.5cm); margin: 0; margin-bottom: 5px; margin-left: 10px;">
            <p style="padding: 10px;">
                <strong style="font-size: 20px; color: #134A6D;">Location:</strong><br>
                Jl. Soekarno - Hatta No.1 2, Labuh Baru Tim.,<br>Kec. Payung Sekaki, Kota Pekanbaru, Riau 28292
            </p>
            <p style="padding: 10px;">
                <strong style="font-size: 20px; color: #134A6D;">Sunday Service:</strong><br>
                {{$home->sunday_service}}
            </p>
            <div class="social-icon">
                <ul>
                    <li><a href="https://themefisher.com/"><i class="tf-ion-social-facebook"></i></a></li>
                    <li><a href="https://themefisher.com/"><i class="tf-ion-social-twitter"></i></a></li>
                    <li><a href="https://themefisher.com/"><i class="tf-ion-social-dribbble-outline"></i></a></li>
                    <li><a href="https://themefisher.com/"><i class="tf-ion-social-linkedin-outline"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- Contact Form -->
        <div class="contact-form col-md-6 "style="padding: 60px;">
            <h3 class="mb-3">Prayer Request</h3>
            <form id="contact-form" method="post" role="form">
                <div class="form-group mb-4">
                    <input type="text" placeholder="Your Name" class="form-control" name="name" id="name" required>
                </div>

                <div class="form-group mb-4">
                    <input type="email" placeholder="Your Email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group mb-4">
                    <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject" required>
                </div>

                <div class="form-group mb-4">
                    <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message" required></textarea>
                </div>
                <div id="cf-submit">
                    <input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
                </div>
            </form>
        </div>
        <!-- ./End Contact Form -->
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="background-color: #134A6D; color: white; padding: 20px 0 20px 20px;">
            <h2 style="font-size: 36px; margin: 0;">Our Location</h2>
        </div>
    </div>
</div>

<div class="google-map" style="overflow: hidden; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
    <div class="map-container" style="height: 400px; padding: 20px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6648451121555!2d101.41735897496467!3d0.5025526994925291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5abafe5923ef1%3A0x7c0d8fd9f5375df0!2sGPdI%20Bethany%20Pekanbaru!5e0!3m2!1sen!2sid!4v1715087224934!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

@endsection
