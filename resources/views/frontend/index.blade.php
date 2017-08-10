@extends('layouts.home')

@section('content')
    <section class="wapper container">
        @include('frontend.banner')
        <?php
        foreach ($posts as $k => $banner) {
            if ($k == 0) {
                $tin1title = $banner->name;
                $tin1anh= $banner->thumbnail;
                $tin1link = route('post', $banner->slug);
                $tin1des= $banner->des;
            }elseif ($k == 1) {
                $tin2title = $banner->name;
                $tin2anh= $banner->thumbnail;
                $tin2link = route('post', $banner->slug);
                $tin2des= $banner->des;
            }elseif ($k == 2) {
                $tin3title = $banner->name;
                $tin3link = route('post', $banner->slug);
                $tin3anh= $banner->thumbnail;
            }elseif ($k == 3) {
                $tin4title = $banner->name;
                $tin4link = route('post', $banner->slug);
                $tin4anh= $banner->thumbnail;
            }
        }
        ?>
        <div class="blockrows">
            <div class="primary col-md-8">
                <div class="tingame">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            Tin game
                        </div>
                    </div>
                    <div class="col-md-6 tinprimary" style="padding-left: 0px;">
                        <a href="{{ $tin1link }}">
                            <img src="{{ asset($tin1anh) }}" style="width: 100%;">
                            <h2>{{$tin1title}}</h2>
                        </a>
                        <p>{{$tin1des}}</p>
                        <div class="themprimary">
                            <span>●</span></span><a href="{{ $tin3link }}"> {{$tin3title}}</a>

                        </div>
                    </div>
                    <div class="col-md-6 tinprimary" style="padding-left: 0px;">
                        <a href="{{ $tin2link }}">
                            <img src="{{ asset($tin2anh) }}" style="width: 100%;">
                            <h2>{{$tin2des}}</h2>
                        </a>
                        <p>{{$tin2des}}</p>
                        <div class="themprimary">
                            <span>●</span></span><a href="{{ $tin4link }}"> {{$tin4title}}</a>
                        </div>
                    </div>
                </div>
                <div class="tinesport">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            TIN ESPORTS
                        </div>
                    </div>
                    {{--@foreach($tinesport as $tinesport)
                        <div class="col-md-12 tinprimary" style="padding-left: 0px;">
                            <div class="col-md-4 tinmucngang">
                                <img src="{{url('public/update')}}/{{$tinesport->image}}">
                            </div>
                            <div class="col-md-8 tinmucngang">
                                <a href="{{url('')}}/{{$tinesport->id}}">
                                    <h3>{{$tinesport->title}}</h3>
                                </a>
                                <p>{{$tinesport->des}}</p>
                            </div>
                        </div>
                    @endforeach--}}
                </div>
            </div>
            <div class="secondarys col-md-4">
                <div class="secondary">
                    <div class="secondaryheader">
                        Tin nổi bật
                    </div>
                </div>
                <div class=" tinprimary" style="padding-left: 0px;">
                    <a href="{{url($tin1link)}}">
                        <img src="{{url('public/update')}}/{{$tin1anh}}" style="width: 100%;">
                        <h2>{{$tin1title}}</h2>
                    </a>
                    <div class="themprimary">
                        <span>●</span></span><a href="{{url($tin2link)}}"> {{$tin2title}}</a>
                    </div>
                    <div class="themprimary">
                        <span>●</span><a href="{{url($tin3link)}}"> {{$tin3title}}</a>
                    </div>
                    <div class="themprimary">
                        <span>●</span><a href="{{url($tin4link)}}"> {{$tin4title}}</a>
                    </div>
                </div>
                <img src="{{url('public/index')}}/img/topup-rp-298x397.jpg" style="width: 100%;">
            </div>
        </div>
        <div class="primary col-md-12">
            <div class="tinesport">
                <div class="primarymenu">
                    <div class="primarymenuheader">
                        COSPLAY
                    </div>
                </div>
                {{--@foreach($cosplay as $cosplay)
                    <div class="col-md-3 cosplay">
                        <a href="{{url('')}}/{{$cosplay->id}}" style="text-decoration: none;">
                            <img src="{{url('public/update')}}/{{$cosplay->image}}" style="width: 100%">
                            <p style="margin-top: 10px;">{{$cosplay->title}}</p>
                        </a>
                    </div>
                @endforeach--}}
            </div>
        </div>
    </section>
@endsection