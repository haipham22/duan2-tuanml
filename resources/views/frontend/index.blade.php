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
                        <a href="{{ route('post', $post->slug) }}" class="col-md-4 tinmucngang">
                            <img src="{{ asset($post->thumbnail) }}">
                        </a>
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
            @include('frontend.sidebar')
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
                        <a href="{{ route('post', $post->slug) }}">
                            <img src="{{ asset($post->thumbnail) }}" style="width: 100%">
                        </a>
                        <a href="{{ route('post', $post->slug) }}">{{ $post->name }}</a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection