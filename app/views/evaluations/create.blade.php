@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova avaliação')) }} @stop

@section('content')
<div class="container" style="display: block; background-color: white; padding: 10px;">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'evaluations']) }}

    <div class="form-group" "input-group">
        {{ Form::label('commentary', Str::title(Lang::get('comentário')), ['class' => 'input-group-addon']) }}
        {{ Form::text('commentary', Input::old('commentary'), ['class' => 'form-control', 'placeholder' => Lang::get('comentário')]) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário')), ['class' => 'input-group-addon']) }}
        {{ Form::select('user_id', $users, Input::old('user_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('checklist_id', Str::title(Lang::get('checklist')), ['class' => 'input-group-addon']) }}
        {{ Form::select('checklist_id', $checklists, Input::old('checklist_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('criar avaliação')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop