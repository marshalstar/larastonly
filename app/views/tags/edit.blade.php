@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar tag')) }} @stop

@section('content')
<div class="container" style="display: block; background-color: white; padding: 10px;">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

    <div class="form-group" "input-group">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nome']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('editar tag')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop