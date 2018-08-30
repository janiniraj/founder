<div class="row">
    <div class="col-md-12">
        <h2 class="headline">QUOTES <a href="{{ route('frontend.recognition-quotes') }}"><span class="see-more hidden-xs">SEE MORE<i class="fas fa-angle-right"></i></span></a></h2>
    </div>

    <div class="col-md-12 section1">
        @foreach($quotes as $single)
            <div class="col-md-6">
                <img src="{{ url('/').'/img/quotes/'.$single->image }}" class="center-block">
                <p class="text-desc">“{{ $single->content }}”</p>
                <img src="{{ url('/')}}/photos/shares/img/icon.png" class="center-block">
                <p class="name">{{ $single->name }} <br>{{ $single->position }}</p>
            </div>
        @endforeach
    </div>

    <div class="col-md-12">
        <a href="{{ route('frontend.recognition-quotes') }}"><span class="see-more-mobile visible-xs">SEE MORE<i class="fas fa-angle-right"></i></span></a>
    </div>
</div>