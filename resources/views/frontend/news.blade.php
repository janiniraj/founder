@extends('frontend.layouts.master')

@section('title', $newsData->name)

@section('content')
    <div class="container" id="media-blog-content">
        <div class="row">
            <div class="col-md-12 blog-cont-1">
                <a href="{{ route('frontend.show-page', 'media') }}"><h2 class="headline-media-back"><i class="fas fa-angle-left"></i>HOME</h2></a>
            </div>

            <div class="col-md-12 blog-cont-2">
                <div class="col-md-8 blog-cont-3">
                    <div class="col-md-12 blog-cont-4">
                        <h2>{{ $newsData->name }}</h2>
                        <h5 class="blog-year">{{ date('d M Y', strtotime($newsData->created_at)) }}</h5>

                        <img src="{{ url('/').'/img/news/'.$newsData->image }}" class="img-responsive">

                        <div class="blog-content-text">{!! $content !!}</div>

                    </div>
                </div>

                <div class="col-md-4">
                    @foreach($latestNews as $single)
                        <div class="col-md-12">
                            <a href="{{ route('frontend.news.show', $single->slug) }}">
                                <h3 class="blog-title">{{ $single->name }}</h3>
                            </a>
                            <h5 class="blog-year">{{ date('d M Y', strtotime($single->created_at)) }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>


    </div>
@endsection
