@extends('frontend/layout/main')

@section('content')
    <!--
            End Fixed Navigation
            ==================================== -->

    <section class="single-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Blog Single</h2>
                    <ol class="breadcrumb header-bradcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Single</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- blog details part start -->
    <section class="blog-details section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="post">
                        <div class="post-image mb-5">
                            <img loading="lazy" class="img-fluid w-100" src="images/blog/post-1.jpg" alt="post-image">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <h3>Cras Sed Elit Sit Amet.</h3>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.
                                Sed ut perspiciatis unde omnis natus error sit voluptatem accusantium dolore mque laudantium
                                totam rem aperiam
                                eaque ipsa quae ab illo inventore veritatis et quasi archite beatae vitae dicta sunt
                                explicabo. nemo enim ipsam
                                voluptatem quia voluptassit.aspernatur aut odit aut fugit.</p>
                            <p>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt neque poro
                                quisquam est, qui dolorem
                                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                                tempora incidunt ut
                                labore et dolore magnam aliquam quaerat voluptatem</p>
                            <p>Occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum. Seper spiciatis
                                unde omnis natus error sit voluptatem accusantium doloremque laudantium totam rem. aperiam
                                eaque ipsa quae
                                ab illo inventore veritatis.</p>
                        </div>
                </div>
            </div> <!-- end container -->
        </div>
    @endsection
