@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo checklist')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'checklists']) }}

    <div class="form-group">
        {{ Form::label('name', Str::title(Lang::get('nome'))) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário'))) }}
        {{ Form::select('user_id', $users, Input::old('user_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Str::title(Lang::get('título'))) }}
        {{ Form::select('title_id', $titles, Input::old('title_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('novo checklist')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop