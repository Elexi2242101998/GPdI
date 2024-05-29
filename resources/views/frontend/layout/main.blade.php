<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Bingo | Responsive Multipurpose Parallax HTML5 Template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="One page parallax responsive HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Bingo HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets-fe/assets/theme/images/header/Logo-gpdi2.png')}}" />

  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{asset('assets-fe/assets/theme/plugins/themefisher-font/style.css')}}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('assets-fe/assets/theme/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="{{asset('assets-fe/assets/theme/plugins/lightbox2/css/lightbox.min.css')}}">
  <!-- animation css -->
  <link rel="stylesheet" href="{{asset('assets-fe/assets/theme/plugins/animate/animate.css')}}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{asset('assets-fe/assets/theme/plugins/slick/slick.css')}}">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets-fe/assets/theme/css/style.css')}}">

</head>
<body id="body">

  <!--
  Start Preloader
  ==================================== -->
  <div id="preloader">
    <div class='preloader'>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!--
  End Preloader
  ==================================== -->

<!--
Fixed Navigation
==================================== -->
<header class="navigation fixed-top">
  <div class="container">
    <!-- main nav -->
    @include('frontend.layout.header')
    <!-- /main nav -->
  </div>
</header>
<!--
End Fixed Navigation
==================================== -->
{{-- Start About Section --}}
@yield('content')
<!-- end section -->

 <!-- end footer -->
@include('frontend.layout.footer')
<!-- end Footer Area
========================================== -->
<!-- 
    Essential Scripts
    =====================================-->
<!-- Main jQuery -->
<script src="{{asset('assets-fe/assets/theme/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap4 -->
<script src="{{asset('assets-fe/assets/theme/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- Parallax -->
<script src="{{asset('assets-fe/assets/theme/plugins/parallax/jquery.parallax-1.1.3.js')}}"></script>
<!-- lightbox -->
<script src="{{asset('assets-fe/assets/theme/plugins/lightbox2/js/lightbox.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('assets-fe/assets/theme/plugins/slick/slick.min.js')}}"></script>
<!-- filter -->
<script src="{{asset('assets-fe/assets/theme/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<!-- Smooth Scroll js -->
<script src="{{asset('assets-fe/assets/theme/plugins/smooth-scroll/smooth-scroll.min.js')}}"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
<script src="{{asset('assets-fe/assets/theme/plugins/google-map/gmap.js')}}"></script>

<!-- Custom js -->
<script src="{{asset('assets-fe/assets/theme/js/script.js')}}"></script>

</body>

</html>
