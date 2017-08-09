<div class="form-inline form-group">
    {!! Form::select('selaction', ['delele' => trans('lang.delete')], old('selaction'), ['class' => 'form-control', 'id' => 'selaction', 'placeholder' => trans('lang.empty')]) !!}
    {!! Form::button(trans('lang.apply'), ['class' => 'btn btn-default', 'id' => 'apply']) !!}
    @if (isset($orders))
        {!! Form::open(['method' => 'get', 'style' => 'display:inline', 'class' => 'pull-right']) !!}
        {!! Form::select('sortBy', $orders , request()->get('sortBy'), ['class' => 'form-control', 'placeholder' => trans('lang.empty')]) !!}
        {!! Form::select('sort', ['asc' => trans('lang.asc'), 'desc' => trans('lang.desc')], request()->get('sort'), ['class' => 'form-control']) !!}
        {!! Form::submit(trans('lang.submit'), ['class' => 'btn btn-default',]) !!}
        {!! Form::close() !!}
    @endif
</div>
