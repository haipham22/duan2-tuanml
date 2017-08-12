{{ e($item->content) }}
<p>
    <button class="btn btn-xs" data-toggle="modal" data-target="#reply-{!! $item->id !!}">@lang('lang.comment_reply')</button>
    {!! link_to_route('reviews.edit', trans('lang.comments.edit'), $item->id, ['class' => 'btn btn-default btn-xs']) !!}
</p>
@include('lang.products.reviews.reviews_reply')