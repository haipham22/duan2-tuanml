@extends('adminlte::page')


@section('title', trans('lang.users'))
@section('content_header')
    <h1>@lang('lang.users')</h1>
@endsection


{{--@push('js')
{!! Html::script('plugins/select2/select2.full.min.js') !!}
{!! Html::script('plugins/select2/i18n/vi.js') !!}
<script type="text/javascript">
    $('.select2').select2({
        language: 'vi',
        tags: true,
        ajax: {
            url: '{!! route('permissions.getRoles') !!}',
            type: 'POST',
            delay: 250,
            minimumInputLength: 1,
            data: function (params) {
                console.log(params)
                return {
                    _token: $('input[name=_token]').val(),
                    s: params.term,
                }
            },
            processResults: function (data) {
                return {
                    results: data.roles
                }
            }
        }
    });
</script>
@endpush--}}

@push('css')
{!! Html::style('plugins/select2/select2.min.css') !!}
@endpush

@section('content')
    <div class="row">
        {!! Form::model($user, ['url' => is_active('users.create') ? route('users.store') : route('users.update', $user->id), 'method' => is_active('users.create') ? 'POST' : 'PUT', 'class' => 'form-horizontal']) !!}
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('lang.users')</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                                {!! Form::label('name', trans('lang.name'), ['class' => 'control-label col-md-2']) !!}
                                <div class="col-md-10">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('lang.name')]) !!}
                                    @if($errors->has('name'))
                                        <span class="help-block">{!! $errors->first('name') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                                {!! Form::label('email', trans('lang.email'), ['class' => 'control-label col-md-2']) !!}
                                <div class="col-md-10">
                                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('lang.email'), is_active('users.edit') ? 'readonly' : '']) !!}
                                    @if($errors->has('email'))
                                        <span class="help-block">{!! $errors->first('email') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                                {!! Form::label('password', trans('lang.password'), ['class' => 'control-label col-md-2']) !!}
                                <div class="col-md-10">
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('lang.password')]) !!}
                                    @if($errors->has('password'))
                                        <span class="help-block">{!! $errors->first('password') !!}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group {!! $errors->has('re-password') ? 'has-error' : '' !!}">
                                {!! Form::label('re-password', trans('lang.re-password'), ['class' => 'control-label col-md-2']) !!}
                                <div class="col-md-10">
                                    {!! Form::password('re-password', ['class' => 'form-control', 'placeholder' => trans('lang.re-password')]) !!}
                                    @if($errors->has('re-password'))
                                        <span class="help-block">{!! $errors->first('re-password') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {!! Form::submit(trans('lang.submit'), ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection