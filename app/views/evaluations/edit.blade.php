@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar avaliação')) }} @stop

@section('content')
    <div class="container theme-showcase">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'PUT']) }}

    <div class="form-group" "input-group">
        {{ Form::label('commentary', Str::title(Lang::get('comentário')), ['class' => 'input-group-addon']) }}
        {{ Form::text('commentary', null, ['class' => 'form-control', 'placeholder' => Lang::get('comentário')]) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário')), ['class' => 'input-group-addon']) }}
        {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('checklist_id', Str::title(Lang::get('checklist')), ['class' => 'input-group-addon']) }}
        {{ Form::select('checklist_id', $checklists, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('Editar Avaliação')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop