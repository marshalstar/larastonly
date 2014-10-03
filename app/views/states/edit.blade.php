@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar state')) }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($state, ['route' => ['states.update', $state->id], 'method' => 'PUT']) }}

    <div class="form-group input-group">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nome']) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('country_id', Str::title(Lang::get('country')), ['class' => 'input-group-addon']) }}
        {{ Form::select('country_id', $countries, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('editar state')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop