@extends('templates.default')

@section('title'){{ Lang::get('Editar'). ' ' .$checklist->name }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($checklist, ['route' => ['checklists.update', $checklist->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('name', Lang::get('Nome')) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Lang::get('Usuário')) }}
        {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Lang::get('Título')) }}
        {{ Form::select('title_id', $titles, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Lang::get('Criar Checklist'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop