@extends('templates.default')

@section('title') Criar Alternativa @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($alternative, ['route' => ['alternatives.update', $alternative->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nome']) }}
    </div>
    <div class="form-group">
        {{ Form::label('type', 'Tipo') }}
        {{ Form::select('type_id', $types, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Criar Alternative', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop