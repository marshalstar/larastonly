@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'alternatives']) }}

    <div class="form-group">
        {{ Form::label('name', Str::title(Lang::get('nome'))) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', Str::title(Lang::get('tipo'))) }}
        {{ Form::select('type_id', $types, Input::old('type_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('nova alternativa'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop