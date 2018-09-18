@extends('frontend.layouts.master')

@section('title', 'Recognition Awards')

@section('content')

<div class="wrapper">
    <img src="/photos/shares/img/pic6.jpg" class="img-responsive hidden-xs" />
</div> 
    <div class="container" id="recognition">
        <div class="row">
            <div class="col-md-12 recognition-head-top">

                <a href="{{ route('frontend.show-page', 'recognition') }}"><h2 class="headline-awards"><i class="fas fa-angle-left"></i>RECOGNITION</h2></a>

            </div>


            <div class="col-md-12" style="padding: 0">
                <div class="col-xs-7 col-sm-8 col-md-8">
                    <h2 class="headline-awards2">AWARDS</h2>
                </div>
                <div class=" col-sm-2 col-md-2 hidden-xs" style="padding: 0;">
                    <h5 class="awards-total">{{ count($awards)}} Awards</h5>
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
            @foreach($awards as $single)
                <div class="col-sm-6 col-md-4">
                    <img src="{{ url('/').'/img/awards/'.$single->image }}" class="center-block">
                    <p class="text-award">{{ $single->name }}</p>
                    <p  class="text-year">{{ $single->year }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
