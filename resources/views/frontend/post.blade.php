@extends('layouts.home')

@section('content')
	<section class="wapper container">

		<div class="blockrows">
			<div class="primary col-md-8">
				<h3>{{$post->name}}</h3>
				<div class="namecate2" style="width: 300px;">{{ $post->created_at }} | {{ $post->categories->name }} | {{ $post->users->name }} | {{ number_format($post->view) }} </div>
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
			@include('frontend.sidebar')
		</div>
	</section>
@endsection
