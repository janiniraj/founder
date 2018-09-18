@extends('frontend.layouts.master')

@section('title', 'Speech')

@section('content')
    <div class="container" id="media-speech">


        <div class="row">
            <div class="col-md-12 speech-page-head-top">
                <a href="{{ route('frontend.show-page', 'media') }}"><h2 class="headline-media-back"><i class="fas fa-angle-left"></i>MEDIA</h2></a>
            </div>
            <div class="col-md-12 speech-page-1">
                <h2 class="headline-media">SPEECHES</h2>
            </div>

            <hr style="clear: both;">

            <div class="col-md-12 speech-page-2">
                @foreach($speeches as $single)
                    <div class="col-md-4 speech-page-3">
                        <div class="col-md-12 speech-page-4">
                            <h3 class="blog-title">{{ $single->name }}</h3>
                            <p class="blog-desc">{{ $single->excerpt }}</p>
                            <h5 class="book-year">{{ date('d M Y', strtotime($single->created_at)) }}</h5>
                            <a href="{{ route('frontend.speech.show', $single->slug) }}"><h5 class="blog-read">READ <i class="fas fa-angle-right"></i></h5></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-12">
            {!! $speeches->render() !!}
        </div>

    </div>
@endsection