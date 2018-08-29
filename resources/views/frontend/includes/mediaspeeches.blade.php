<!-- SPEECH -->
<hr class="mobile_books" style="margin-top: 40px;border-color: #454545;">

<div class="row">
    <div class="col-md-12 speech-head-top">
        <h2 class="headline-media">SPEECHES <a href="{{ route('frontend.speech.index') }}"><span class="see-more-media">SEE MORE<i class="fas fa-angle-right"></i></span></a></h2>
    </div>

    <div class="col-md-12 speech-1 desktop_books">
        <div class="col-md-4 speech-2">
            @foreach($speeches as $key => $single)
                @if($key == 0)
                    <div class="col-md-12 speech-3">
                        <h3 class="blog-title">{{ $single->name }}</h3>
                        <p class="blog-desc">{{ $single->excerpt }}</p>
                        <h5 class="book-year">{{ date('d M Y', strtotime($single->created_at)) }}</h5>
                        <h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-md-8">
            <div class="col-md-12">
                @foreach($speeches as $key => $single)
                    @if($key == 1 || $key == 2)
                        <div class="col-md-6">
                            <h3 class="blog-title">{{ $single->name }}</h3>
                            <h5 class="book-year">{{ date('d M Y', strtotime($single->created_at)) }}</h5>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="col-md-12" style="margin-top: 48px;padding: 0 30px;">
                @foreach($speeches as $key => $single)
                    @if($key == 3)
                        <h1 class="speech_big_title">“{{ $single->name }}”</h1>
                        <h3 class="speech_name">{{ $single->excerpt }}</h3>
                        <h5 class="book-year">{{ date('d M Y', strtotime($single->created_at)) }}</h5>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="mobile_books blog_mobile speeches_mobile">
        <div class="main_books">
            <div class="col-md-12">
                @foreach($speeches as $key => $single)
                    @if($key == 0)
                        <div class="col-xs-12" style="margin-top: -18px; padding-left: 0; margin-left: -15px;">
                            <h3 class="book-title" style="line-height: 1.5;">{{ $single->name }}</h3>
                            <p class="book-desc">{{ $single->excerpt }}</p>
                            <h5 class="book-year">{{ date('d M Y', strtotime($single->created_at)) }}</h5>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="mobile_slider col-xs-12">
            <div class="slider">
                @foreach($speeches as $key => $single)
                    @if($key != 0)
                        <div class="item">
                            <div class="col-xs-12" style="padding: 0;">
                                <h5>{{ $single->name }}</h5>
                                <h5>{{ $single->excerpt }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div> <!-- Mobile -->
</div>
<!-- SPEECH end -->
<a href="{{ route('frontend.speech.index') }}" class="mobile_see_all" style="top: 10px;">SEE ALL <i class="fa fa-angle-right"></i></a>