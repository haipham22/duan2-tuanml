@extends('layouts.home')

@section('content')
	<section class="wapper container">

		<div class="blockrows">
			<div class="primary col-md-8">
				<h3>{{$post->name}}</h3>
				<div class="namecate2" style="width: 300px;">{{ $post->created_at }} | {{ $post->categories->name }} </div>
				<div style="max-width: 600px;text-align: justify;margin-top: 15px;margin-left: 20px">
                    {!! htmlspecialchars_decode($post->content) !!}
				</div>
				<div style="width: 100%;height: 1px;background-color: #333;float: left;margin-top: 30px;"></div>
				<div class="binhluan">

					<form action="{{ route('comment.add') }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="post_id" value="{{ $post->id }}">
						@if(Auth::check())
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						@endif
						<div class="form-group">
							<label for="name">Tên</label>
							<input type="text" class="form-control" id="name" name="name" value="{{ old('content') }}">
						</div>
						<div class="form-group">
							<label for="content">Nội dung</label>
							<textarea rows="5"  class="form-control" id="content" name="content"></textarea>
						</div>
						<button class="btn btn-flat" style="margin-top: 10px;">Đăng bình luận</button>
					</form>

					<div style="float: right;margin-top: 10px;">
						<img src="{{ asset('images/i-fb.jpg') }}">
						<img src="{{ asset('images/i-youtube.jpg') }}">
					</div>
					@if(count($post->comments) > 0)
					@php($comments = $post->comments()->wherePublic(1)->orderByDesc('created_at')->paginate(10))
					@foreach($comments as $comment)
					<div class="comment">
						<div class="noidung">
							<b>{{ $comment->name }}</b>
							<span class="date">
								{{ $comment->created_at->diffForHumans() }}
							</span>
							<p>{{ strip_tags($comment->content) }}</p>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
					<nav class="navigation Page ">
					{{ $comments->links() }}
					</nav>
					@endif
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
