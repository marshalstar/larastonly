@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar avaliação')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('commentary', Str::title(Lang::get('comentário'))) }}
        {{ Form::text('commentary', null, ['class' => 'form-control', 'placeholder' => Lang::get('comentário')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário'))) }}
        {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('checklist_id', Str::title(Lang::get('checklist'))) }}
        {{ Form::select('checklist_id', $checklists, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('criar avaliação')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop