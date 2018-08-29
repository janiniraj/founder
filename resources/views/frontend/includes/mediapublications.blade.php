<!-- PUBLICATION -->
<div class="row">
    <div class="col-md-12 top-head">
        <h2 class="headline-media">PUBLICATIONS <a href="{{ route('frontend.publications') }}"><span class="see-more-media">SEE ALL PUBLICATIONS<i class="fas fa-angle-right"></i></span></a></h2>
    </div>

    <div class="col-md-12 publ-1 desktop_books">
        <div class="col-md-4 publ-2">
            @foreach($publications as $key => $single)
                @if($key == 0)
                    <div class="col-md-12 publ-3">
                        <img src="{{ url('/').'/img/publications/'.$single->image }}" class="img-responsive">
                        <h3 class="book-title">{{ $single->name }}</h3>
                        <h5 class="book-year">{{ $single->year }}</h5>
                        <p class="book-desc">{{ $single->content }}</p>
                        <a download href="{{ $single->url }}" class="btn btn-default">Download</a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-md-8 publ-4">
            <div class="col-md-12">
                @foreach($publications as $key => $single)
                    @if($key == 1)
                        <div class="col-md-5">
                            <img src="{{ url('/').'/img/publications/'.$single->image }}" class="img-responsive">
                        </div>
                        <div class="col-md-7" style="padding-left: 0;">
                            <h3 class="book-title">{{ $single->name }}</h3>
                            <h5 class="book-year">{{ $single->year }}</h5>
                            <p class="book-desc">{{ $single->content }}</p>
                            <a download href="{{ $single->url }}" class="btn btn-default">Download</a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-12 publ-5">

                @foreach($publications as $key => $single)
                    @if($key == 0 || $key == 1)
                        @php continue; @endphp
                    @endif
                    <div class="col-md-3">
                        <img src="{{ url('/').'/img/publications/'.$single->image }}" class="img-responsive">
                        <h5 class="book-small">{{ $single->name }}</h5>
                        <h5 class="book-year">{{ $single->year }}</h5>
                        <a download href="{{ $single->url }}" class="btn btn-default">Download</a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="mobile_books">
        <div class="main_books">
            <div class="col-md-12">
                @foreach($publications as $key => $single)
                    @if($key == 0)
                        <div class="col-sm-5" style="padding: 0; margin-left: -15px;">
                            <img src="{{ url('/').'/img/publications/'.$single->image }}" class="img-responsive">
                        </div>
                        <div class="col-sm-7" style="margin-top: -18px; padding-left: 0; margin-left: -10px;">
                            <h3 class="book-title">{{ $single->name }}</h3>
                            <h5 class="book-year">{{ $single->year }}</h5>
                            <p class="book-desc">{{ $single->content }}</p>
                            <a download href="{{ $single->url }}" class="btn btn-default">Download</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <hr class="mobile_books" style="margin-top: 40px;border-color: #454545;">

        <div class="mobile_slider col-xs-12">
            <div class="slider">

                @foreach($publications as $key => $single)

                    @if($key == 0)
                        @php continue; @endphp
                    @endif

                    <div class="item">
                        <div class="col-xs-12" style="padding: 0;">
                            <img src="{{ url('/').'/img/publications/'.$single->image }}">
                        </div>
                        <div class="col-xs-12" style="padding: 0;">
                            <h5>{{ $single->name }}</h5>
                            <h5>{{ $single->year }}</h5>
                            <a download href="{{ $single->url }}" class="btn btn-default">Download</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<a href="{{ route('frontend.publications') }}" class="mobile_see_all">SEE ALL PUBLICATIONS <i class="fa fa-angle-right"></i></a>

<!-- PUBLICATION end-->