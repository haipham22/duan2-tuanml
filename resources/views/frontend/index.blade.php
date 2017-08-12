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
            {{--<div class="secondarys col-md-4">
                <div class="secondary">
                    <div class="secondaryheader">
                        Tin game
                    </div>
                </div>
                <div class=" tinprimary" style="padding-left: 0px;">
                    <img src="img/kayn_shadow_assasin_by_rikamarika-dbgc8h4-2.jpg" style="width: 100%;">
                    <a href="">
                        <h2>Tham khảo những bộ trang bị mà Kayn có thể lên ở mỗi dạng</h2>
                    </a>
                    <p>Cùng xem những bộ trang bị nào phù hợp nhất với Kayn nhé</p>
                    <div class="themprimary">
                        <span>●</span></span><a href=""> Hướng dẫn xây dựng trang bị cho cả Kayn ở cả hai dạng Darkin và Sát Thủ</a>
                    </div>
                    <div class="themprimary">
                        <span>●</span><a href=""> Hướng dẫn cộng bảng ngọc và bổ trợ cho Kayn ở vị trí đi rừng</a>
                    </div>
                </div>
                <img src="img/topup-rp-298x397.jpg" style="width: 100%;">
            </div>--}}
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
                        <a href="">{{ $post->name }}</a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection