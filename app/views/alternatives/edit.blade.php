@extends('templates.default')

@section('title'){{ Lang::get('Editar'). ' ' .$alternative->name }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($alternative, ['route' => ['alternatives.update', $alternative->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('name', Lang::get('Nome')) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', Lang::get('Tipo')) }}
        {{ Form::select('type_id', $types, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Lang::get('Criar Alternativa'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop