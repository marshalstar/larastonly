@extends('templates.default')

@section('title'){{ Lang::get('Criar Avaliação') }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('commentary', Lang::get('Comentário')) }}
        {{ Form::text('commentary', null, ['class' => 'form-control', 'placeholder' => Lang::get('comentário')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Lang::get('Usuário')) }}
        {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('checklist_id', Lang::get('Checklist')) }}
        {{ Form::select('checklist_id', $checklists, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Lang::get('Criar Avaliação'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop