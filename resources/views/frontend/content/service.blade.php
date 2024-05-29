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

<div class="container">
    <div class="d-flex justify-content-center" style="padding: 15px;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/DsK5NJhooFQ?si=A1rFX2DImY2ND2E2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="border-radius: 15px; margin-top: 20px; margin-bottom: 20px;"></iframe>
    </div>
</div>

<section class="blog" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <!-- section title -->
            <div class="col-xl-6 col-lg-8">
                <div class="title text-center">
                    <h2> Our <span class="color">Services</span></h2>
                    <div class="border"></div>
                    <p>Join All The Worship Services at GPdI Jemaat Bethany</p>
                </div>
            </div>
            <!-- /section title -->
        </div>

        <div class="row">
            <!-- single blog post -->
            <article class="col-lg-4 col-md-6">
                <div class="post-item">
                    <div class="media-wrapper" style="width: 100%; height: 300px; overflow: hidden;">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/about/j1.jpg') }}" alt="ibadah kaum ibu" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="content">
                        <h3><a href="single-post.html">Ibadah Kaum Wanita</a></h3>
                        <p>Setiap Hari Sabtu</p>
                        <p>17.00</p>

                        <a class="btn btn-main" href="{{route('kaumwanita')}}">Read more</a>
                    </div>
                </div>
            </article>
            <!-- /single blog post -->

            <!-- single blog post -->
            <article class="col-lg-4 col-md-6">
                <div class="post-item">
                    <div class="media-wrapper" style="width: 100%; height: 300px; overflow: hidden;">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/kaumbapa.jpg') }}" alt="ibadah kaum bapa" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="content">
                        <h3><a href="single-post.html">Ibadah Kaum Bapa</a></h3>
                        <p>Setiap Hari Rabu</p>
                        <p>17.00</p>
                        <a class="btn btn-main" href="single-post.html">Read more</a>
                    </div>
                </div>
            </article>
            <!-- /single blog post -->

            <!-- single blog post -->
            <article class="col-lg-4 col-md-6">
                <div class="post-item">
                    <div class="media-wrapper" style="width: 100%; height: 300px; overflow: hidden;">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/ibadahraya.jpg') }}" alt="ibadah rayon" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="content">
                        <h3><a href="single-post.html">Ibadah Rayon</a></h3>
                        <p>Setiap Hari Kamis</p>
                        <p>17.00</p>
                        <a class="btn btn-main" href="single-post.html">Read more</a>
                    </div>
                </div>
            </article>
            <!-- /single blog post -->

            <!-- single blog post -->
            <article class="col-lg-4 col-md-6">
                <div class="post-item">
                    <div class="media-wrapper" style="width: 100%; height: 300px; overflow: hidden;">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/ibadahyouth.jpg') }}" alt="Ibadah Youth" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="content">
                        <h3><a href="single-post.html">Ibadah Youth</a></h3>
                        <p>Setiap Hari Sabtu</p>
                        <p>19.00</p>
                        <a class="btn btn-main" href="single-post.html">Read more</a>
                    </div>
                </div>
            </article>
            <!-- /single blog post -->

            <!-- single blog post -->
            <article class="col-lg-4 col-md-6">
                <div class="post-item">
                    <div class="media-wrapper" style="width: 100%; height: 300px; overflow: hidden;">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/ibadahminggu.jpg') }}" alt="amazing caves coverimage" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="content">
                        <h3><a href="single-post.html">Ibadah Raya Minggu</a></h3>
                        <p>Setiap Hari Minggu</p>
                        <p>09.00 dan 17.00</p>
                        <a class="btn btn-main" href="single-post.html">Read more</a>
                    </div>
                </div>
            </article>
            <!-- end single blog post -->

            <!-- single blog post -->
            <article class="col-lg-4 col-md-6">
                <div class="post-item">
                    <div class="media-wrapper" style="width: 100%; height: 300px; overflow: hidden;">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/sekolahminggu.jpg') }}" alt="amazing caves coverimage" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="content">
                        <h3><a href="single-post.html">Ibadah Sekolah Minggu</a></h3>
                        <p>Setiap Hari Minggu</p>
                        <p>09.00</p>
                        <a class="btn btn-main" href="single-post.html">Read more</a>
                    </div>
                </div>
            </article>
            <!-- end single blog post -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</section> <!-- end section -->
@endsection
