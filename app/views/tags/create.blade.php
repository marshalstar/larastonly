@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova tag')) }} @stop

@section('content')
<div class="container" style="display: block; background-color: white; padding: 10px;">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'tags']) }}

    <div class="form-group" "input-group">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('nova tag')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop