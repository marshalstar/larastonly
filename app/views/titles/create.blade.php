@extends('templates.default')

@section('title'){{ Str::title(Lang::get('criar título')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'titles']) }}

    <div class="form-group">
        {{ Form::label('name', Str::title(Lang::get('nome'))) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', Str::title(Lang::get('nome'))) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('criar title')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop