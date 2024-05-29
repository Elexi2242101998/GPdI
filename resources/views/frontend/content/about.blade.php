@extends('frontend.layout.main')

@section('content')
    <section class="single-page-header"
        style="background-image: url({{route('storage',$about->gambar)}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="about-shot-info section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="color: #134A6D; font-weight: bold;">History</h2>
                </div>
                <div class="col-md-6"
                    style="padding: 20px 30px; display: flex; align-items: center; justify-content: center;">
                    <img loading="lazy" class="img-fluid" src="{{route('storage',$about->gambar)}}"
                        alt="Meghna"
                        style="border-top-right-radius: 130px; width: 100%; max-width: 100%; height: 300px; object-fit: cover;">
                </div>
                <div class="col-md-6" style="padding: 20px 30px; display: flex; align-items: center;">
                    <p style="text-align: justify;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit voluptatum totam
                        dolores assumenda vel, quia earum voluptatem blanditiis vero accusantium saepe aliquid nulla nemo
                        accusamus, culpa inventore! Culpa nemo aspernatur tenetur, at quam aliquid reprehenderit obcaecati
                        dicta illum mollitia, perferendis hic, beatae voluptates? Ex labore, obcaecati harum nam.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit voluptatum totam
                        dolores assumenda velLorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit
                        voluptatum totam dolores assumenda vel, quia earum voluptatem blanditiis vero accusantium
                        saepe aliquid nulla nemo accusamus, culpa inventore! Culpa nemo aspernatur tenetur, at quam
                        aliquid reprehenderit obcaecati dicta illum mollitia, perferendis hic, beatae voluptates?
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding: 20px 30px; display: flex; align-items: center;">
                    <p style="text-align: justify;">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit voluptatum totam
                        dolores assumenda vel, quia earum voluptatem blanditiis vero accusantium saepe aliquid nulla nemo
                        accusamus, culpa inventore! Culpa nemo aspernatur tenetur, at quam aliquid reprehenderit obcaecati
                        dicta illum mollitia, perferendis hic, beatae voluptates? Ex labore, obcaecati harum nam.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit voluptatum totam
                        dolores assumenda velLorem ipsum dolor sit amet, consectetur adipisicing elit. Facere in suscipit
                        voluptatum totam dolores assumenda vel, quia earum voluptatem blanditiis vero accusantium
                        saepe aliquid nulla nemo accusamus, culpa inventore! Culpa nemo aspernatur tenetur, at quam
                        aliquid reprehenderit obcaecati dicta illum mollitia, perferendis hic, beatae voluptates?
                    </p>
                </div>
                <div class="col-md-6"
                    style="padding: 20px 30px; display: flex; align-items: center; justify-content: center;">
                    <img loading="lazy" class="img-fluid" src="{{route('storage',$about->gambar)}}"
                        alt="Meghna"
                        style="border-top-left-radius: 130px; width: 100%; max-width: 100%; height: 300px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>
    <section class="company-mission" style="background-color: #134A6D; margin-top: 20px; margin-bottom: 20px;">
        <div class="container" style="margin-top: 20px">
            <div class="row justify-content-center">
                <!-- section title -->
                <div class="col-xl-6 col-lg-8" style="margin-top: 20px">
                    <div class="title text-center" style="color: white">
                        <h2 style="color: white; padding: 30px 0; font-size: 36px; margin: 0; font-weight: bold;">OUR PRIEST
                        </h2>
                        <div class="border"></div>
                    </div>
                </div>
                <!-- /section title -->
            </div>
            <div class="row">
                <div class="contact-form col-md-6 ">
                    <div style="padding: 20px 30px; display: flex; align-items: center; justify-content: center;">
                        <img loading="lazy" class="img-fluid"
                            src="{{ asset('assets-fe/assets/theme/images/about/omherman.jpg') }}" alt="Om Herman"
                            style="border-radius: 30px; width: auto; max-width: 100%; height: 600px; object-fit: cover;">
                    </div>

                </div>
                <div class="contact-details col-md-6 ">
                    <h3 class="mb-3" style="color: white;font-weight: bold;margin-top: 20px;">Pdt. Rudolf Herman</h3>
                    <div class="social-icon">
                        <ul>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

                            <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f" style="color: white;"></i></a></li>
                            <li><a href="https://www.instagram.com/"><i class="fab fa-instagram" style="color: white;"></i></a></li>
                            <li><a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp" style="color: white;"></i></a></li>

                        </ul>
                    </div>
                    <p style="margin-top: 20px;font-style: italic; color:white;font-size:20px;">"Jadilah Garam dan terang dunia" (Matius 5:13-14)
                    </p>
                    <p style="margin-top: 20px; color:white;font-size:20px;">Pendeta Rudolf Herman adalah seorang hamba Tuhan yang telah melayani selama bertahun-tahun. Beliau memiliki passion yang besar untuk menyebarkan firman Tuhan dan membantu orang lain untuk bertumbuh dalam iman mereka. Pendeta Rudolf Herman dikenal sebagai seorang pengkhotbah yang dinamis dan inspiratif, dan beliau juga seorang pemimpin yang bijaksana dan penuh kasih.

Beliau telah melayani di berbagai gereja dan organisasi Kristen, dan beliau telah menyentuh kehidupan banyak orang melalui pelayanannya. Pendeta Rudolf Herman adalah teladan bagi banyak orang Kristen, dan beliau adalah inspirasi bagi semua orang yang ingin melayani Tuhan.
                    </p>
                </div>



            </div>
    </section>
    <section class="section gallery">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="title text-center">
                        <h2>Sneak Peak Gallery</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore numquam esse vitae recusandae
                            qui aspernatur, blanditiis, laboriosam dignissimos dolore facere provident ex? Porro,
                            praesentium
                            consectetur tempore. Nulla, error eius dolorem.
                        </p>
                        <div class="border"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="company-gallery">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/company/gallery-1.jpg') }}"
                            alt="">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/company/gallery-2.jpg') }}"
                            alt="">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/company/gallery-3.jpg') }}"
                            alt="">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/company/gallery-4.jpg') }}"
                            alt="">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/company/gallery-5.jpg') }}"
                            alt="">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/company/gallery-5.jpg') }}"
                            alt="">
                        <img loading="lazy" src="{{ asset('assets-fe/assets/theme/images/company/gallery-5.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection