@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo tipo')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($type, ['route' => ['types.update', $type->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('name', Str::title(Lang::get('nome'))) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('novo tipo')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop