@extends('adminlte::page')

@section('title', trans('lang.categories'))
@section('content_header')
    <h1>@lang('lang.categories')</h1>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('lang.categories.create')</h3>
                </div>
                <div class="box-body">
                    {!! Form::open() !!}
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
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::label('description', trans('lang.description')) !!}
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => trans('lang.description'), 'rows' => 3]) !!}
                        @if($errors->has('description'))
                            <span class="help-block">{!! $errors->first('description') !!}</span>
                        @endif
                    </div>
                    <div class="form-group text-center">
                        {!! Form::submit(trans('lang.submit'), ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('lang.categories.index')</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('flash::message')
                            @component('include.toolbar')
                                @slot('orders' , [
                                    'name' => trans('lang.name'),
                                ])
                            @endcomponent
                            <table class="table table-responsive">
                                <thead>
                                <th width="1%"><input type="checkbox" name="select_all" id="select_all" value="1" /></th>
                                <th>@lang('lang.name')</th>
                                <th>@lang('lang.slug')</th>
                                <th>@lang('lang.count')</th>
                                <th>@lang('lang.tool')</th>
                                </thead>
                                <tbody>
                                @if($categories->count() > 0)
                                    @foreach($categories as $item)
                                        <tr>
                                            <td><input type="checkbox" name="ids[]" value="{!! $item->id !!}" /></td>
                                            <td>{!! link_to_route('categories.edit', $item->name, $item->id) !!}</td>
                                            <td>{!! $item->slug !!}</td>
                                            <td>{!! link_to_route('categories.show', $item->count, $item->id) !!}</td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'url' => route('categories.destroy', $item->id)]) !!}
                                                {!! Form::submit(trans('lang.delete'), ['class' => 'delete btn btn-danger btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">{!! $categories->links() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection