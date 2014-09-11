@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar')). ' ' .$alternative->name }} @stop

@section('content')

    <div class="container theme-showcase">

        {{ HTML::ul($errors->all()) }}

        {{ Form::model($alternative, ['route' => ['alternatives.update', $alternative->id], 'method' => 'PUT']) }}

        <div class="form-group input-group">
            {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('type', Str::title(Lang::get('tipo')), ['class' => 'input-group-addon']) }}
            {{ Form::select('type_id', $types, null, ['class' => 'form-control']) }}
        </div>

        {{ Form::submit(Str::title(Lang::get('editar alternativa')), ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div>

@stop