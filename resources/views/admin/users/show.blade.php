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
        {!! Form::model($user, [route('users.update', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
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
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'readonly', 'placeholder' => trans('lang.name')]) !!}
                                    @if($errors->has('name'))
                                        <span class="help-block">{!! $errors->first('name') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {!! $errors->has('role') ? 'has-error' : '' !!}">
                                {!! Form::label('role', trans('lang.role'), ['class' => 'control-label col-md-2']) !!}
                                <div class="col-md-10">
                                    {!! Form::select('role', [1 => 'Admin', 2 => 'Thành viên'], old('role'), ['class' => 'form-control select2']) !!}
                                    @if($errors->has('role'))
                                        <span class="help-block">{!! $errors->first('role') !!}</span>
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