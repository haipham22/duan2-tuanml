@extends('adminlte::page')


@section('title', trans('lang.settings'))
@section('content_header')
    <h1>@lang('lang.settings')</h1>
@endsection




@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('lang.settings')</h3>
        </div>
        <div class="box-body">{!! Form::open(['url' => route('setting.save'), 'class' => 'form-horizontal']) !!}
            <div class="form-group {!! $errors->has('facebook') ? 'has-error' : '' !!}">
                {!! Form::label('site_url', trans('lang.facebook'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('facebook', Setting::get('facebook'), ['class' => 'form-control', 'placeholder' => trans('lang.facebook')]) !!}
                </div>
                @if($errors->has('facebook'))
                    <span class="help-block">{!! $errors->first('facebook') !!}</span>
                @endif
            </div>
            <div class="form-group {!! $errors->has('twitter') ? 'has-error' : '' !!}">
                {!! Form::label('twitter', trans('lang.twitter'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('twitter', Setting::get('twitter'), ['class' => 'form-control', 'placeholder' => trans('lang.twitter')]) !!}
                </div>
                @if($errors->has('twitter'))
                    <span class="help-block">{!! $errors->first('twitter') !!}</span>
                @endif
            </div>
            <div class="form-group {!! $errors->has('site_url') ? 'has-error' : '' !!}">
                {!! Form::label('site_url', trans('lang.site_url'), ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('site_url', Setting::get('site_url'), ['class' => 'form-control', 'placeholder' => trans('lang.site_url')]) !!}
                </div>
                @if($errors->has('site_url'))
                    <span class="help-block">{!! $errors->first('site_url') !!}</span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit(trans('lang.submit'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection