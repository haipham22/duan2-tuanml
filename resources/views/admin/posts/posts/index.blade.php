@extends('adminlte::page')


@section('title', trans('lang.posts'))
@section('content_header')
    <h1>@lang('lang.posts')</h1>
@endsection

@push('js')
<script type="text/javascript">
    $(function() {
        $('table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                { data: 'id', name: 'id', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'categories', name: 'categories' },
                { data: 'tool', name: 'tool', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('lang.posts')</h3>
        </div>
        <div class="box-body">
            @include('flash::message')
            <table class="table table-responsive">
                <thead>
                <th width="1%"><input type="checkbox" name="select_all" id="select_all" value="1" /></th>
                <th>@lang('lang.name')</th>
                <th>@lang('lang.categories')</th>
                <th>@lang('lang.tool')</th>
                </thead>
            </table>
        </div>
    </div>
@endsection