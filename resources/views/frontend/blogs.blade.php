@extends('frontend.layouts.master')

@section('title', 'Blogs')

@section('content')
    <div class="container" id="media-blog">
        <div class="row">
            <div class="col-md-12 blog-page-head-top">
                <a href="media.php"><h2 class="headline-media-back"><i class="fas fa-angle-left"></i>MEDIA</h2></a>
            </div>


            <div class="col-md-12  blog-page-head">
                <h2 class="headline-media">BLOG</h2>
            </div>


            <div class="col-md-12 blog-page-1">
                <div class="col-md-4 blog-page-2">
                    <a href="blog_content.php">
                        <div class="col-md-12 blog-page-3">
                            <img src="../img/blog_big.png" class="img-responsive">
                            <h3 class="blog-title">English readiness – Are young Malaysians equipped for the globalised world?</h3>
                            <h5 class="blog-year">5 Sep 2015</h5>
                            <p class="blog-desc">As the lingua franca of the world, English, is the most widely spoken language in the world other than Mandarin and China, as the world’s most populous nation aspires to become the world’s largest English-speaking nation.</p>
                            <h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5>
                        </div>
                    </a>
                </div>

                <div class="col-md-8 blog-page-4">

                    <div class="col-md-12"  style="margin-top: 60px;">
                        <a href="blog_content.php">
                            <div class="col-md-6">
                                <img src="../img/blog_small.png" class="img-responsive">
                                <a href="blog_content.php"><h5 class="blog-title">English readiness – Are young Malaysians equipped for the globalised world?</h5></a>
                                <h5 class="blog-year">5 Sep 2015</h5>
                            </div>
                        </a>
                        <a href="blog_content.php">
                            <div class="col-md-6">
                                <img src="../img/blog_small.png" class="img-responsive">
                                <a href="blog_content.php"><h5 class="blog-title">English readiness – Are young Malaysians equipped for the globalised world?</h5></a>
                                <h5 class="book-year">5 Sep 2015</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 second-part">


                <div class="col-md-8 blog-page-5">
                    <div class="col-md-12 blog-page-6">

                        <div class="col-md-12 blog-page-7">
                            <a href="blog_content.php">
                                <div class="col-md-6" style="padding-left: 0;">
                                    <img src="../img/blog_small.png" class="img-responsive">
                                    <a href="blog_content.php"><h5 class="blog-small">English readiness – Are young Malaysians equipped for the globalised world?</h5></a>
                                    <h5 class="blog-year">5 Sep 2015</h5>
                                </div>
                            </a>
                            <a href="blog_content.php">
                                <div class="col-md-6">
                                    <img src="../img/blog_small.png" class="img-responsive">
                                    <a href="blog_content.php"><h3 class="blog-title">English readiness – Are young Malaysians equipped for the globalised world?</h3></a>
                                    <h5 class="book-year">5 Sep 2015</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12 blog-page-8">
                            <a href="blog_content.php">
                                <div class="col-md-6" style="padding-left: 0;">
                                    <img src="../img/blog_medium.png" class="img-responsive">
                                </div>
                                <div class="col-md-6" style="margin-top: 10px;">
                                    <h3 class="blog-title">English readiness – Are young Malaysians equipped for the globalised world?</h3>
                                    <h5 class="book-year">5 Sep 2015</h5>
                                    <p class="blog-desc" style="padding-right: 0px;">As the lingua franca of the world, English, is the most widely spoken language in the world other than Mandarin and China, as the world’s most populous nation aspires to become the world’s largest English-speaking nation.</p>
                                    <h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>


                </div>

                <div class="col-md-4" >
                    <a href="blog_content.php">
                        <div class="col-md-12">
                            <img src="../img/blog_big.png" class="img-responsive">
                            <h3 class="blog-title">English readiness – Are young Malaysians equipped for the globalised world?</h3>
                            <h5 class="blog-year">5 Sep 2015</h5>
                            <p class="blog-desc">As the lingua franca of the world, English, is the most widely spoken language in the world other than Mandarin and China, as the world’s most populous nation aspires to become the world’s largest English-speaking nation.</p>
                            <h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="margin-top: 50px;">
            <button type="button" class="btn btn-default center-block">LOAD MORE</button>
        </div>
    </div>
@endsection
