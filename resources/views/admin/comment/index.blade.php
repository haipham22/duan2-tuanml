@extends('adminlte::page')

@section('title', trans('lang.comments.index'))
@section('content_header')
    <h1>@lang('lang.comments.index')</h1>
@endsection

@push('js')
<script type="text/javascript">
    $('html').on('click', '.btn-send-comment', function (e) {
        e.preventDefault();
        var content,
            form = $(this).closest('.modal-dialog');

        return (content = form.find('textarea:first').val(),
        content.length == 0) ?
            (form.find(".form-group").addClass("has-error").find("label").html("Bạn chưa nhập nội dung ý kiến !"), !1) :
            content.length < 10 ? (form.find(".form-group.validate").addClass("has-error").find("label").html("Nội dung ý kiến quá ngắn !"), !1) :
                content.length > 1e3 ? (form.find(".form-group.validate").addClass("has-error").find("label").html("Nội dung ý kiến quá dài !"), !1) :
                    (form.find('form').submit(), !1)
    });
    $(function() {
        $('table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                { data: 'id', name: 'id', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'content', name: 'content' },
                { data: 'post', name: 'post' },
                { data: 'created_at', name: 'created_at' },
                { data: 'tool', name: 'tool', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('lang.comments.index')</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="list">
                <thead>
                <tr>
                    <th width="1%"><input type="checkbox" name="select_all" id="select_all" value="1" /></th>
                    <th width="10%">@lang('lang.name')</th>
                    <th width="30%">@lang('lang.content')</th>
                    <th width="30%">@lang('lang.products')</th>
                    <th>@lang('lang.updated_at')</th>
                    <th>@lang('lang.tool')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection