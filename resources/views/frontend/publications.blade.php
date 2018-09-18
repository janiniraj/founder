@extends('frontend.layouts.master')

@section('title', 'Publications')

@section('content')
    <div class="container" id="media-publication">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('frontend.show-page', 'media') }}"><h2 class="headline-media-back"><i class="fas fa-angle-left"></i>MEDIA</h2></a>
            </div>


            <div class="col-md-12">
                <h2 class="headline-media">PUBLICATIONS</h2>
            </div>

            <div class="col-md-12 books_preview" style="margin-top: 40px;">
                @foreach($publications as $key => $single)
                    @if($key == 0)
                        <div class="col-sm-6 col-md-4 main">
                            <img src="{{ url('/').'/img/publications/'.$single->image }}" class="img-responsive publication-main-image">
                        </div>

                        <div class="col-sm-6 col-md-8">
                            <h3 class="book-title-media">{{ $single->name }}</h3>
                            <h5 class="book-year-media">{{ $single->year }}</h5>
                            <p class="book-desc-media">{{ $single->content }}</p>
                            <a class="book-url-media" download href="{{ $single->url }}" class="btn btn-default">Download</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <hr class="preview_hr">

        <div class="row">
            @foreach($publications as $key => $single)
                <div class="col-sm-6 col-md-4 all-book">
                    <div class="col-md-5 book-space">
                        <img src="{{ url('/').'/img/publications/thumbnail/'.$single->image }}" mainimage="{{ url('/').'/img/publications/'.$single->image }}" class="img-responsive">
                    </div>
                    <div class="col-md-7">
                        <h5 class="book-small-media">{{ $single->name }}</h5>
                        <h5 class="book-year-media-small">{{ $single->year }}</h5>
                        <p class="book-desc-media-small">{{ $single->content }}</p>
                        <a class="book-url-media-small" download href="{{ $single->url }}" class="btn btn-default">Download</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>
        // Change content of preview from clicked div
        $(document).ready(function(){
            $(".all-book").on('click', function(){
                var src = $(this).find('img').attr('mainimage');
                $('.publication-main-image').attr('src', src);

                var headline = $(this).find('.book-small-media').text();
                $(".book-title-media").html(headline);

                var year = $(this).find('.book-year-media-small').text();
                $(".book-year-media").html(year);

                var description = $(this).find('.book-desc-media-small').text();
                $(".book-desc-media").html(description);

                var url = $(this).find('.book-url-media-small').text();
                $(".book-url-media").html(url);
            });
        });

        $(document).ready(function() {
            if (window.matchMedia('(max-width: 500px)').matches) {
                var mobile_src = $('.book-space').find('img').attr('mainimage');
                $('.book-space>img').attr('src', mobile_src);
            }
        });
    </script>
@endpush