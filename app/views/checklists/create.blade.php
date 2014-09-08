@extends('templates.default')

@section('title'){{ Lang::get('Criar Checklist') }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'checklists']) }}

    <div class="form-group">
        {{ Form::label('name', Lang::get('Nome')) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Lang::get('Usuário')) }}
        {{ Form::select('user_id', $users, Input::old('user_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Lang::get('Título')) }}
        {{ Form::select('title_id', $titles, Input::old('title_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Lang::get('Criar Checklist'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop