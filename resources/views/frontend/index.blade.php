@extends('layouts.home')

@section('content')
    <section class="wapper container">
        @include('frontend.banner')
        <div class="blockrows">
            <div class="primary col-md-8">
                <div class="tingame">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            {{ $games->name }}
                        </div>
                    </div>
                    @foreach($games->posts()->orderByDesc('created_at')->get()->take(4)->chunk(2) as $listPost)
                    <div class="col-md-6 tinprimary" style="padding-left: 0px;">
                        @foreach($listPost as $post)
                        @if($loop->index == 0)
                        <a href="{{ route('post', $post->slug) }}">
                            <img src="{{ asset($post->thumbnail) }}" style="width: 100%;">
                            <h2>{{ $post->name }}</h2>
                        </a>
                        <p>{{ str_limit(strip_tags($post->content), 100) }}</p>
                        @else
                        <div class="themprimary">
                            <span>●</span></span><a href="{{ route('post', $post->slug) }}">{{ $post->name }}</a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endforeach
                </div>
                <div class="tinesport">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            {{ $esport->name }}
                        </div>
                    </div>
                    @foreach($esport->posts()->orderByDesc('created_at')->get()->take(4) as $post)
                    <div class="col-md-12 tinprimary" style="padding-left: 0px;">
                        <div class="col-md-4 tinmucngang">
                            <img src="{{ asset($post->thumbnail) }}">
                        </div>
                        <div class="col-md-8 tinmucngang">
                            <a href="{{ route('post', $post->slug) }}">
                                <h3>{{ $post->name }}</h3>
                            </a>
                            <p>{{ str_limit(strip_tags($post->content), 100) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
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
                        <span>●</span></span><a href=""> {{ $news->name }}</a>
                    </div>
                    @endif
                    @endforeach
                </div>
                <img src="img/topup-rp-298x397.jpg" style="width: 100%;">
            </div>
            <div class="col-md-12">
                <div class="tinesport">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            {{ $cosplays->name }}
                        </div>
                    </div>
                    @if($cosplays->posts->count() > 0)
                    @foreach($cosplays->posts->sortByDesc('created_at')->take(4) as $post)
                    <div class="col-md-3 cosplay">
                        <img src="{{ asset($post->thumbnail) }}" style="width: 100%">
                        <a href="{{ route('post', $post->slug) }}">{{ $post->name }}</a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection