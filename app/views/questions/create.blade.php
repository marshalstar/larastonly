@extends('templates.default')

@section('title'){{ Lang::get('Criar Avaliação') }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'questions']) }}

    <div class="form-group">
        {{ Form::label('statement', Lang::get('Enunciado')) }}
        {{ Form::text('statement', Input::old('statement'), ['class' => 'form-control', 'placeholder' => Lang::get('enunciado')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Lang::get('Usuário')) }}
        {{ Form::select('user_id', $users, Input::old('user_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('checklist_id', Lang::get('Checklist')) }}
        {{ Form::select('checklist_id', $checklists, Input::old('checklist_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Lang::get('Criar Avaliação'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop