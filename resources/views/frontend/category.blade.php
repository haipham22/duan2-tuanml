@extends('layouts.home')

@section('content')
    <section class="wapper container">
        <div class="blockrows">
            <div class="primary col-md-8">
                <div class="tingame">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            {{ $items->name }}
                        </div>
                    </div>
                    @php($posts = $items->posts()->paginate(12))
                    @foreach($posts->chunk(2) as $post)
                    <div class="row" style="padding: 15px;">
                        @foreach($post as $item)
                            <div class="col-md-6 tinprimary" style="padding-left: 0px;">
                                <a href="{{ route('post', $item->slug) }}">
                                    <img src="{{ asset($item->thumbnail) }}" style="width: 100%;">
                                    <h2>{{$item->name}}</h2>
                                </a>
                                <p>{!! str_limit(strip_tags($item->content)) !!}</p>
                            </div>
                        @endforeach
                    </div>

                    @endforeach
                    <div class="clearfix"></div>
                    <nav class="pagination">
                        {{ $posts->links() }}
                    </nav>
                </div>
                {{--<div class="tinesport">--}}
                    {{--<div class="primarymenu">--}}
                        {{--<div class="primarymenuheader">--}}
                            {{--TIN ESPORTS--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@foreach($tinesport as $tinesport)--}}
                        {{--<div class="col-md-12 tinprimary" style="padding-left: 0px;">--}}
                            {{--<div class="col-md-4 tinmucngang">--}}
                                {{--<img src="{{url('public/update')}}/{{$tinesport->image}}">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-8 tinmucngang">--}}
                                {{--<a href="{{url('')}}/{{$tinesport->id}}">--}}
                                    {{--<h3>{{$tinesport->title}}</h3>--}}
                                {{--</a>--}}
                                {{--<p>{{$tinesport->des}}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            </div>
            <div class="secondarys col-md-4">
                <img src="{{ asset('img/topup-rp-298x397.jpg') }}" style="width: 100%;">
            </div>
        </div>
        <div class="primary col-md-12">
            <div class="tinesport">
                <div class="primarymenu">
                    <div class="primarymenuheader">
                        {{ $items->name }}
                    </div>
                </div>
                @foreach($items->posts as $item)
                    <div class="col-md-3 cosplay">
                        <img src="{{ asset($item->thumbnail) }}" style="width: 100%">
                        <a href="{{ route('post', $item->slug) }}">{{$item->name}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection