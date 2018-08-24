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

            <div class="col-md-12">
                @php $i = 0; @endphp
                @foreach($blogs as $blogData)
                    @if(in_array($i, [0,1,5,6]))
                        <div class="col-md-6">
                            <a href="blog_content.php">
                                <div class="col-md-6" style="padding-left: 0;">
                                    <img src="{{ url('/').'/img/blogs/thumbnail/'.$blogData->image }}" class="img-responsive">
                                </div>
                                <div class="col-md-6" style="margin-top: 10px;">
                                    <h3 class="blog-title">{{ $blogData->name }}</h3>
                                    <h5 class="book-year">{{ date('d M Y', strtotime($blogData->created_at)) }}</h5>
                                    <p class="blog-desc" style="padding-right: 0px;">{{ $blogData->excerpt }}</p>
                                    <h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-md-4">
                            <a href="blog_content.php">
                                <div class="col-md-12 blog-page-3">
                                    <img src="{{ url('/').'/img/blogs/thumbnail/'.$blogData->image }}" class="img-responsive">
                                    <h3 class="blog-title">{{ $blogData->name }}</h3>
                                    <h5 class="blog-year">{{ date('d M Y', strtotime($blogData->created_at)) }}</h5>
                                    <p class="blog-desc">{{ $blogData->excerpt }}</p>
                                    <h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5>
                                </div>
                            </a>
                        </div>
                    @endif
                    @php $i++; @endphp
                @endforeach
            </div>

        </div>

        <div class="col-md-12" style="margin-top: 50px;">
            <button type="button" class="btn btn-default center-block">LOAD MORE</button>
        </div>
    </div>
@endsection
