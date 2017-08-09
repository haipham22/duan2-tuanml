{!! Form::open(['method' => 'DELETE', 'url' => route('posts.destroy', $item->id)]) !!}
{!! Form::submit(trans('lang.delete'), ['class' => 'delete btn btn-danger btn-xs']) !!}
{!! Form::close() !!}