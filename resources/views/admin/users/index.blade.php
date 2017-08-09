@extends('adminlte::page')

@section('title', trans('lang.users.index'))
@section('content_header')
    <h1>@lang('lang.users.index')</h1>
@endsection


@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('lang.users.index')</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                    @component('include.toolbar')
                        @slot('orders', [
                            'id' => trans('lang.ID'),
                            'name' => trans('lang.name'),
                            'email' => trans('lang.email'),
                        ])
                    @endcomponent
                    <table class="table table-responsive table-bordered table-responsive table-stripped">
                        <thead>
                            <th width="1%"><input type="checkbox" name="select_all" id="select_all" /></th>
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.email')</th>
                            <th>@lang('lang.create_at')</th>
                            <th>@lang('lang.tool')</th>
                        </thead>
                        <tbody>
                        @if($users->count() > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{!! $user->id !!}" /></td>
                                    <td>{!! link_to_route('users.edit', $user->name, $user->id) !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->created_at->diffForHumans() !!}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'url' => route('users.destroy', $user->id)]) !!}
                                            {!! Form::submit(trans('lang.delete'), ['class' => 'delete btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection