<div class="row">
    <div class="col-md-12" style="margin-bottom: 52px;">
        <h2 class="headline">AWARDS <a href="{{ route('frontend.recognition-awards') }}"><span class="see-more hidden-xs">SEE MORE<i class="fas fa-angle-right"></i></span></a></h2>
    </div>

    @foreach($awards as $single)
        <div class="col-xs-12 col-sm-6 col-md-4">
            <img src="{{ url('/').'/img/awards/'.$single->image }}" class="center-block">
            <p class="text-award">{{ $single->name }}</p>
            <p  class="text-year">{{ $single->year }}</p>
        </div>
    @endforeach

    <div class="col-md-12" style="margin-bottom: 52px;">
        <a href="{{ route('frontend.recognition-awards') }}"><span class="see-more-mobile visible-xs">SEE MORE<i class="fas fa-angle-right"></i></span></a>
    </div>
</div>