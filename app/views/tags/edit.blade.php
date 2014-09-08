@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar tag')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('name', Str::title(Lang::get('name'))) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('editar tag')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop