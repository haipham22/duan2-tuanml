@extends('layouts.home')

@section('content')
    <section class="wapper container">
        <div class="blockrows">
            <div class="primary col-md-8">
                <div class="tingame">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            Tìm kiếm cho {{ request()->get('s') }}
                        </div>
                    </div>
                    @foreach($items as $item)
                        <div class="col-md-6 tinprimary" style="padding-left: 0px;">
                            <a href="{{ route('post', $item->slug) }}">
                                <img src="{{ asset($item->thumbnail) }}" style="width: 100%;">
                                <h2>{{$item->name}}</h2>
                            </a>
                            <p>{!! str_limit(strip_tags($item->content)) !!}</p>
                            {{--<div class="themprimary">--}}
                            {{--<span>●</span></span><a href="{{ $tin3link }}"> {{$tin3title}}</a>--}}

                            {{--</div>--}}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="secondarys col-md-4">
                <img src="{{ asset('img/topup-rp-298x397.jpg') }}" style="width: 100%;">
            </div>
        </div>
    </section>
@endsection