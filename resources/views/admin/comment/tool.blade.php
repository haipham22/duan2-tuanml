{!! Form::open(['url' => route('comments.update', $item->id), 'method' => 'PATCH', ]) !!}
{!! Form::hidden('public', $item->public ? 0 : 1) !!}
{!! Form::submit($item->public ? 'Ẩn' : 'Hiện', ['class' => $item->public ? 'btn-xs btn btn-success' : 'btn-xs btn btn-warning']) !!}
{!! Form::close() !!}

{!! Form::open(['url' => route('comments.destroy', $item->id), 'method' => 'DELETE', ]) !!}
{!! Form::submit('Xóa', ['class' => 'btn-xs delete btn btn-danger']) !!}
{!! Form::close() !!}