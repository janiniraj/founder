@extends('frontend.layouts.master')

@section('title', 'Recognition Awards')

@section('content')
    <div class="container" id="recognition">
        <div class="row">
            <div class="col-md-12 recognition-head-top">
                <a href="{{ route('frontend.show-page', 'recognition') }}"><h2 class="headline-awards"><i class="fas fa-angle-left"></i>RECOGNITION</h2></a>
            </div>


            <div class="col-md-12" style="padding: 0">
                <div class="col-xs-7 col-sm-8 col-md-8">
                    <h2 class="headline-awards2">QUOTES</h2>
                </div>
                <div class=" col-sm-2 col-md-2 hidden-xs" style="padding: 0;">
                    <h5 class="awards-total">{{ $quotes->total() }} Quotes</h5>
                </div>
                <div class="col-xs-5 col-sm-2 col-md-2 rec-dropdwon">
                    <div class="select">
                        <select>
                            <option>All</option>
                            <option>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                        </select>
                        <div class="select_arrow">
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hidden-xs">
        </div>
        <div class="row">
            @foreach($quotes as $single)
                <div class="col-md-12 quotes-full">
                    <div class="col-md-4" style="padding: 0">
                        <img src="{{ url('/').'/img/quotes/'.$single->image }}" class="quotes-img">
                    </div>
                    <div class="col-md-8"  style="padding: 0">
                        <p class="text-desc-quotes">{{ $single->content }}</p>
                        <img src="{{ url('/')}}/photos/shares/img/icon.png" style="margin-top: 9px;" class="img-mobile">
                        <p class="name-quotes">{{ $single->name }} <br>{{ $single->position }}</p>
                    </div>
                </div>
            @endforeach


            <div class="col-md-12">
                {!! $quotes->render() !!}
            </div>

        </div>
    </div>
@endsection
