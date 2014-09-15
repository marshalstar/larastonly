@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('content')

<div class="container" style="display: block; background-color: white; padding: 10px;">

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['url' => 'alternatives']) }}

        <div class="form-group input-group">
            {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
            {{ Form::text('name', Input::old('name'), ['class' => 'form-control field', 'placeholder' => Lang::get('nome')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('type', Str::title(Lang::get('tipo')), ['class' => 'input-group-addon']) }}
            {{ Form::select('type_id', $types, Input::old('type_id'), ['class' => 'form-control']) }}
        </div>

        {{ Form::submit(Str::title(Lang::get('nova alternativa')), ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
</div>

@stop