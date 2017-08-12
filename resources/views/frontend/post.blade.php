@extends('layouts.home')

@section('content')
	<section class="wapper container">

		<div class="blockrows">
			<div class="primary col-md-8">
				<h3>{{$post->name}}</h3>
				<div class="namecate2" style="width: 300px;">{{ $post->created_at }} | {{ $post->categories->name }} </div>
				<div style="max-width: 600px;text-align: justify;margin-top: 15px;margin-left: 20px">
                    {!! $post->content !!}
				</div>
				<div style="width: 100%;height: 1px;background-color: #333;float: left;margin-top: 30px;"></div>
				<div class="binhluan">
					<textarea rows="5"  class="form-control" name="content"></textarea>
					<button class="btn btn-flat" style="margin-top: 10px;">Đăng bình luận</button>
					<div style="float: right;margin-top: 10px;">
						<img src="{{ asset('images/i-fb.jpg') }}">
						<img src="{{ asset('images/i-youtube.jpg') }}">
					</div>
					<div class="comment">
						<div style="border: 2px #333 solid;width: 154px;float: left;">
							<img src="{{ asset('img/qua-xoai.jpg') }}" style="width: 150px;height: 150px;">
						</div>
						<div class="noidung">
							<b>Quả xoài</b>
							<span class="date">
								11:35 18/07/2017
							</span>
							<p>Tôi thấy bài viết này rất hay...</p>
						</div>
						<input type="button" value="Trả lời" name="" class="traloi btn btn-flat" >
					</div>
				</div>
			</div>
			{{--<div class="secondarys col-md-4"><!-- --}}
				{{--<div class="secondary">--}}
					{{--<div class="secondaryheader">--}}
						{{--Tin game--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class=" tinprimary" style="padding-left: 0px;">--}}
					{{--<img src="{{url('public/index')}}/img/kayn_shadow_assasin_by_rikamarika-dbgc8h4-2.jpg" style="width: 100%;">--}}
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
	</section>
@endsection
