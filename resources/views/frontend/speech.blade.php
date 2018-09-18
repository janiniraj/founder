@extends('frontend.layouts.master')

@section('title', $speechData->name)

@section('content')
    <div class="container" id="media-speech-content">
        <div class="row">
            <div class="col-md-12 speech-cont-head-top">
                <a href="{{ route('frontend.speech.index') }}"><h2 class="headline-media-back"><i class="fas fa-angle-left"></i>SPEECHES</h2></a>
            </div>

            <div class="col-md-12 speech-cont-page-1">
                <div class="col-md-8 speech-cont-page-2">
                    <div class="col-md-12 speech-cont-page-3">
                        <h2 class="speech-headline">{{ $speechData->name }}</h2>
                        <h5 class="book-year">{{ date('d M Y', strtotime($speechData->created_at)) }}</h5>

                        <div class="speech-content-text">{!! $content !!}</div>
                    </div>
                </div>
                <div class="col-md-4 speech-cont-page-4">
                    @foreach($latestSpeech as $single)
                        <div class="col-md-12">
                            <a href="{{ route('frontend.speech.show', $single->slug) }}">
                                <h3 class="speech-content-title">{{ $single->name }}</h3>
                            </a>
                            <h5 class="blog-year">{{ date('d M Y', strtotime($single->created_at)) }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
     

    </div>
@endsection
