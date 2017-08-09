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
        <div class="box-body">
            {!! Form::open(['class' => 'form-horizontal', 'url' => route('setting.save')]) !!}
            <div class="form-group">
                {!! Form::label('address', trans('lang.address'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('address', Setting::get('address'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', trans('lang.phone'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('phone', Setting::get('phone'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('admin_email', trans('lang.email'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::email('admin_email', Setting::get('admin_email'), ['class' => 'form-control']) !!}
                </div>
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