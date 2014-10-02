@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

<div class="container container-main">

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['url' => 'checklists']) }}

        <div class="form-group input-group">
            {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
            {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('Nome')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('user_id', Str::title(Lang::get('usuário')), ['class' => 'input-group-addon']) }}
            {{ Form::select('user_id', $users, Input::old('user_id'), ['class' => 'form-control']) }}
        </div>

        {{ Form::submit(Str::title(Lang::get('novo checklist')), ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
</div>
@stop