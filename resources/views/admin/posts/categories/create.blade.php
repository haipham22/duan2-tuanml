@extends('adminlte::page')

@section('title', trans('lang.categories'))
@section('content_header')
    <h1>@lang('lang.categories')</h1>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('lang.categories')</h3>
        </div>
        <div class="box-body">
            {!! Form::model($category, ['url' => is_active('categories.create') ? route('categories.store') : route('categories.update', $category->id), 'method' => is_active('categories.create') ? 'POST' : 'PUT', 'class' => 'form-horizontal']) !!}
            <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                {!! Form::label('name', trans('lang.name'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('lang.name')]) !!}
                    @if($errors->has('name'))
                        <span class="help-block">{!! $errors->first('name') !!}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
                {!! Form::label('slug', trans('lang.slug'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => trans('lang.slug')]) !!}
                    @if($errors->has('slug'))
                        <span class="help-block">{!! $errors->first('slug') !!}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                {!! Form::label('description', trans('lang.description'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => trans('lang.description'), 'rows' => 3]) !!}
                    @if($errors->has('description'))
                        <span class="help-block">{!! $errors->first('description') !!}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    {!! Form::submit(trans('lang.submit'), ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection