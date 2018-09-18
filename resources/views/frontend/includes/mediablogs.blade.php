<!-- BLOG -->
<hr class="mobile_books" style="margin-top: 40px;border-color: #454545;">

<div class="row">
    <div class="col-md-12 blog-head-top">
        <h2 class="headline-media">BLOG <a href="{{ route('frontend.blog.index') }}"><span class="see-more-media">SEE MORE<i class="fas fa-angle-right"></i></span></a></h2>
    </div>

    <div class="col-md-12 blog-1 desktop_books">
        <div class="col-md-4 blog-2">
            <div class="col-md-12 blog-3">
                @foreach($blogs as $key => $blogData)
                    @if($key == 0)
                        <a href="{{ route('frontend.blog.show', $blogData->slug) }}">
                            <img src="{{ url('/').'/img/blogs/thumbnail/'.$blogData->image }}" class="img-responsive">
                            <h3 class="blog-title">{{ $blogData->name }}</h3>
                        </a>
                        <h5 class="blog-year">{{ date('d M Y', strtotime($blogData->created_at)) }}</h5>
                        <p class="blog-desc">{{ $blogData->excerpt }}</p>
                        <a href="{{ route('frontend.blog.show', $blogData->slug) }}">
                            <h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-8 blog-4">
            <div class="col-md-12">
                @foreach($blogs as $key => $blogData)
                    @if($key == 1)
                        <div class="col-md-6">
                            <a href="{{ route('frontend.blog.show', $blogData->slug) }}">
                                <img src="{{ url('/').'/img/blogs/thumbnail/'.$blogData->image }}" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <a href="{{ route('frontend.blog.show', $blogData->slug) }}">
                                <h3 class="blog-title">{{ $blogData->name }}</h3>
                            </a>
                            <h5 class="book-year">{{ date('d M Y', strtotime($blogData->created_at)) }}</h5>
                            <p class="blog-desc" style="padding-right: 0px;">{{ $blogData->excerpt }}</p>
                            <a href="{{ route('frontend.blog.show', $blogData->slug) }}"><h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5></a>
                        </div>
                    @endif
                @endforeach

            </div>

            <div class="col-md-12"  style="margin-top: 60px;">
                @foreach($blogs as $key => $blogData)
                    @if($key == 0 || $key == 1)
                        <div class="col-md-6">
                            <a href="{{ route('frontend.blog.show', $blogData->slug) }}">
                                <img src="{{ url('/').'/img/blogs/thumbnail/'.$blogData->image }}" class="img-responsive">
                                <h5 class="blog-small">{{ $blogData->name }}</h5>
                            </a>
                            <h5 class="blog-year">{{ date('d M Y', strtotime($blogData->created_at)) }}</h5>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="mobile_books blog_mobile">
        <div class="main_books">
            <div class="col-md-12">
                @foreach($blogs as $key => $blogData)
                    @if($key == 0)
                        <div class="col-sm-5" style="padding: 0; margin-left: -15px;">
                            <img src="{{ url('/').'/img/blogs/thumbnail/'.$blogData->image }}" class="img-responsive">
                        </div>
                        <div class="col-sm-7" style="margin-top: -18px; padding-left: 20px;">
                            <h3 class="book-title" style="line-height: 1.5;">{{ $blogData->name }}</h3>
                            <h5 class="book-year">{{ date('d M Y', strtotime($blogData->created_at)) }}</h5>
                            <p class="book-desc">{{ $blogData->excerpt }}</p>
                            <a href="{{ route('frontend.blog.show', $blogData->slug) }}"><h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5></a>
                            
                        </div>
                        <hr class="mobile_books" style="margin-top: 40px;border-color: #454545;clear: both;">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="mobile_slider col-xs-12">
            <div class="slider">
                @foreach($blogs as $key => $blogData)
                    @if($key != 0)
                        <div class="item">
                            <div class="col-xs-12" style="padding: 0;">
                                <img src="{{ url('/').'/img/blogs/thumbnail/'.$blogData->image }}">
                            </div>
                            <div class="col-xs-12" style="padding: 0;">
                                <h5>{{ $blogData->name }}</h5>
                                <h5>{{ date('d M Y', strtotime($blogData->created_at)) }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div> <!-- Mobile -->
</div>
<a href="{{ route('frontend.blog.index') }}" class="mobile_see_all" style="top: 18px;">SEE ALL <i class="fa fa-angle-right"></i></a>
<!-- BLOG end-->