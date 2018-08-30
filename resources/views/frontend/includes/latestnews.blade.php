<div class="col-md-8 section_four_news">
    <div class="col-md-12">
        <h3>LATEST NEWS</h3>
    </div>
    @foreach($latestnews as $single)
        <div class="col-md-4">
            <a href="{{ route('frontend.news.show', $single->slug) }}">
                <img src="{{ url('/').'/img/news/thumbnail/'.$single->image }}">
                <h4>{{ $single->name }}</h4>
                <p>{{ date('d M Y', strtotime($single->created_at)) }}</p>
            </a>
        </div>
    @endforeach
</div>