@extends('adminlte::page')

@section('title', trans('lang.comments.index'))
@section('content_header')
    <h1>@lang('lang.comments.index')</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('lang.comments.edit')</h3>
        </div>
        <div class="box-body">
            {!! Form::model($review, ['method' => 'put', 'url' => route('reviews.update', $review->id)]) !!}
            <div class="form-group">
                {!! Form::label('name', trans('lang.name')) !!}
                {!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                {!! Form::label('content', trans('lang.content')) !!}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'placeholder' => trans('lang.content'), 'rows' => 3]) !!}
                @if($errors->has('content'))
                    <span class="help-block">{!! $errors->first('content') !!}</span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::submit(trans('lang.submit'), ['class' => 'btn btn-primary btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection