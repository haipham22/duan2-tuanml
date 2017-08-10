@extends('layouts.home')

@section('content')
    <section class="wapper container">

        <div class="blockrows">
            <div class="primary col-md-8">
                <div class="tinesport">
                    <div class="primarymenu">
                        <div class="primarymenuheader">
                            video
                        </div>
                    </div>
                    @foreach($items->posts as $hinhanh)
                        <div class="col-md-4 cosplay">
                            <a href="{{ route('post', $hinhanh->slug) }}" style="text-decoration: none;">
                                <img src="{{ asset($hinhanh->thumbnail) }}" style="width: 100%">
                                <p style="margin-top: 10px;">{{$hinhanh->name}}</p>
                            </a>
                        </div>
                    @endforeach
                    <div style="width: 100%;height: 1px;background-color: #333;float: left;margin-top: 30px;"></div>
                    <div class="panigate">
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>...</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{--<div class="secondarys col-md-4"><!-- --}}
				{{--<div class="secondary">--}}
					{{--<div class="secondaryheader">--}}
						{{--Tin nổi bật--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class=" tinprimary" style="padding-left: 0px;">--}}
					{{--<img src="img/kayn_shadow_assasin_by_rikamarika-dbgc8h4-2.jpg" style="width: 100%;">--}}
					{{--<a href="">--}}
						{{--<h2>Tham khảo những bộ trang bị mà Kayn có thể lên ở mỗi dạng</h2>--}}
					{{--</a>--}}
					{{--<p>Cùng xem những bộ trang bị nào phù hợp nhất với Kayn nhé</p>--}}
					{{--<div class="themprimary">--}}
						{{--<span>●</span></span><a href=""> Hướng dẫn xây dựng trang bị cho cả Kayn ở cả hai dạng Darkin và Sát Thủ</a>--}}
					{{--</div>--}}
					{{--<div class="themprimary">--}}
						{{--<span>●</span><a href=""> Hướng dẫn cộng bảng ngọc và bổ trợ cho Kayn ở vị trí đi rừng</a>--}}
					{{--</div>--}}
				{{--</div> -->--}}
                {{--<img src="{{url('public/index')}}/img/topup-rp-298x397.jpg" style="width: 100%;">--}}
            {{--</div>--}}
        </div>
        {{--<div class="primary col-md-12">--}}
            {{--<div class="tinesport">--}}
                {{--<div class="primarymenu">--}}
                    {{--<div class="primarymenuheader">--}}
                        {{--COSPLAY--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--@foreach($cosplay as $cosplay)--}}
                    {{--<div class="col-md-3 cosplay">--}}
                        {{--<a href="{{url('')}}/{{$cosplay->id}}" style="text-decoration: none;">--}}
                            {{--<img src="{{url('public/update')}}/{{$cosplay->image}}" style="width: 100%">--}}
                            {{--<p style="margin-top: 10px;">{{$cosplay->title}}</p>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    </section>
@endsection