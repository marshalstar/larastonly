@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo título')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'titles']) }}

    <div class="form-group">
        {{ Form::label('name', Str::title(Lang::get('nome'))) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Str::title(Lang::get('título'))) }}
        {{ Form::select('title_id', $titles, Input::old('title_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('novo título')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop