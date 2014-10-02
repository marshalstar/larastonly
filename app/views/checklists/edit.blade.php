@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar')). ' ' .$checklist->name }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($checklist, ['route' => ['checklists.update', $checklist->id], 'method' => 'PUT']) }}

    <div class="form-group input-group">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário')), ['class' => 'input-group-addon']) }}
        {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('editar checklist')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop