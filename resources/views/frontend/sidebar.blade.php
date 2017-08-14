<div class="secondarys col-md-4">
    <div class="secondary">
        <div class="secondaryheader">
            Tin nổi bật
        </div>
    </div>
    <div class=" tinprimary" style="padding-left: 0px;">
        @foreach($hot_news as $news)
            @if($loop->index == 0)
                <img src="{{ asset($news->thumbnail) }}" style="width: 100%;">
                <a href="{{ route('post', $news->slug) }}">
                    <h2>{{ $news->name }}</h2>
                </a>
                <p>{{ str_limit(strip_tags($news->content)) }}</p>
            @else
                <div class="themprimary">
                    <span>●</span></span><a href="{{ route('post', $news->slug) }}"> {{ $news->name }}</a>
                </div>
            @endif
        @endforeach
    </div>
    <a href="//lienminh.garena.vn/khuyen-mai-game/khuyen-mai-cac-trang-phuc-huyet-nguyet-10-02-19-02">
        <img src="{{ asset('img/topup-rp-298x397.jpg') }}" style="width: 100%;">
    </a>
</div>