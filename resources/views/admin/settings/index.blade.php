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
            {!! Form::open(['class' => 'form-horizontal', 'url' => route('settings.save')]) !!}
            <div class="form-group">
                {!! Form::label('name', trans('lang.name'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('name', Setting::get('name'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', trans('lang.description'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::text('description', Setting::get('description'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('paginate', trans('lang.paginate'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::number('paginate', Setting::get('paginate'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('admin_email', trans('lang.email'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::email('admin_email', Setting::get('admin_email'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('collapse_sidebar', trans('lang.collapse_sidebar'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::select('collapse_sidebar', [ true => 'Tắt', false => 'Bật'], Setting::get('collapse_sidebar'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('layout', trans('lang.layout'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::select('layout', [
                        'boxed' => 'Box',
                        'fixed' => 'Fix',
                        'top-nav' => 'Top Nav',
                    ], Setting::get('layout'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('admin_skin', trans('lang.admin_skin'), ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                    {!! Form::select('admin_skin', [
                        'blue' => 'Xanh lục',
                        'blue-light' => 'Xanh lục trắng',
                        'black' => 'Đen',
                        'black-light' => 'Trắng',
                        'purple' => 'Tím',
                        'purple-light' => 'Tím trắng',
                        'yellow' => 'Vàng',
                        'yellow-light' => 'Vàng trắng',
                        'red' => 'Đỏ',
                        'red-light' => 'Đỏ trắng',
                        'green' => 'Xanh lá',
                        'green-light' => 'Xanh lá trắng',
                    ], Setting::get('admin_skin'), ['class' => 'form-control']) !!}
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