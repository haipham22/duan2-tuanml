<div id="reply-{!! $item->id !!}" class="modal fade reply" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Trả lời bình luận {!! str_limit($item->content, 20) !!}</h4>
            </div>
            <div class="modal-body">
                <div class="form">
                    {!! Form::open() !!}
                    {!! Form::hidden('user_id', Auth::id()) !!}
                    {!! Form::hidden('product_id', $item->product_id) !!}
                    {!! Form::hidden('status', 1) !!}
                    {!! Form::hidden('name', Auth::user()->name) !!}
                    {!! Form::hidden('reply_id', ($item->reply_id == 0) ? $item->id : $item->parent->id) !!}
                    <div class="form-group validate" style="display: block;">
                        {!! Form::label('content', trans('lang.content')) !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control content-' . $item->id, 'rows' => 3, 'style' => 'width: 100%']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn-send-comment btn btn-info">Gửi</button>
            </div>
        </div>
    </div>
</div>
