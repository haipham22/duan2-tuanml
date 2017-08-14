@extends('adminlte::page')

@section('title', trans('lang.posts'))
@section('content_header')
    <h1>@lang('lang.posts')</h1>
@endsection

@push('css')
{!! Html::style('plugins/select2/select2.min.css') !!}
@endpush

@push('js')
{!! Html::script('plugins/ckeditor/ckeditor.js') !!}
{!! Html::script('plugins/ckfinder/ckfinder.js') !!}
{!! Html::script('plugins/select2/select2.full.min.js') !!}
{!! Html::script('plugins/select2/i18n/vi.js') !!}
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{{url('plugins/ckfinder/ckfinder.html')}}',
            filebrowserImageBrowseUrl: '{{url('plugins/ckfinder/ckfinder.html?type=Images')}}',
            filebrowserFlashBrowseUrl: '{{url('plugins/ckfinder/ckfinder.html?type=Flash')}}',
            filebrowserUploadUrl: '{{url('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}',
            filebrowserImageUploadUrl: '{{url('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}',
            filebrowserFlashUploadUrl: '{{url('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')}}'
        });
    });
</script>
@endpush

@section('content')
    {!! Form::model($post, ['url' => is_active('posts.create') ? route('posts.store') : route('posts.update', $post->id), 'method' => is_active('posts.create') ? 'POST' : 'PUT', 'autocomplete' => 'off',]) !!}
    {!! Form::hidden('type', 'post') !!}
    <div class="row">
        <div class="col-md-12 form-group">
            <button type="submit" class="btn btn-success">@lang('lang.submit')</button>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('lang.posts.create')</h3>
                </div>
                <div class="box-body">
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::label('name', trans('lang.name')) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('lang.name')]) !!}
                        @if($errors->has('name'))
                            <span class="help-block">{!! $errors->first('name') !!}</span>
                        @endif
                    </div>
                    <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
                        {!! Form::label('slug', trans('lang.slug')) !!}
                        {!! Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => trans('lang.slug')]) !!}
                        @if($errors->has('slug'))
                            <span class="help-block">{!! $errors->first('slug') !!}</span>
                        @endif
                    </div>
                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
                        {!! Form::label('content', trans('lang.content')) !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'placeholder' => trans('lang.content')]) !!}
                        @if($errors->has('content'))
                            <span class="help-block">{!! $errors->first('content') !!}</span>
                        @endif
                    </div>
                </div>
            </div>
            {{--<div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        @lang('lang.seo')
                    </h3>
                </div>
                <div class="box-body">
                    <div class="form-group {!! $errors->has('seo_title') ? 'has-error' : '' !!}">
                        {!! Form::label('seo_title', trans('lang.seo.title')) !!}
                        {!! Form::text('seo_title', old('seo_title'), ['class' => 'form-control', 'placeholder' => trans('lang.seo.title')]) !!}
                        @if($errors->has('seo_title'))
                            <span class="help-block">{!! $errors->first('seo_title') !!}</span>
                        @endif
                    </div>
                    <div class="form-group {!! $errors->has('seo_description') ? 'has-error' : '' !!}">
                        {!! Form::label('seo_description', trans('lang.seo.description')) !!}
                        {!! Form::textarea('seo_description', old('seo_description'), ['class' => 'form-control', 'placeholder' => trans('lang.seo.description'), 'rows' => 3]) !!}
                        @if($errors->has('seo_description'))
                            <span class="help-block">{!! $errors->first('seo_description') !!}</span>
                        @endif
                    </div>
                </div>
            </div>--}}
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-body">
                    <div class="form-group {!! $errors->has('category_id') ? 'has-error' : '' !!}">
                        {!! Form::label('category_id', trans('lang.categories')) !!}
                        {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2']) !!}
                        @if($errors->has('category_id'))
                            <span class="help-block">{!! $errors->first('category_id') !!}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('thumbnail', trans('lang.thumbnails')) !!}
                        {!! Form::text('thumbnail', old('thumbnail'), ['class' => 'form-control ckfinder']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection