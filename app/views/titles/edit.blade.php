@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo título')) }} @stop

@section('content')

    <div class="container" style="display: block; background-color: white; padding: 10px;">

        {{ HTML::ul($errors->all()) }}

        {{ Form::model($title, ['route' => ['titles.update', $title->id], 'method' => 'PUT']) }}

        <div class="form-group input-group">
            {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('title_id', Str::title(Lang::get('título')), ['class' => 'input-group-addon']) }}
            {{ Form::select('title_id', $titles, null, ['class' => 'form-control']) }}
        </div>

        {{ Form::submit(Str::title(Lang::get('novo título')), ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div>

@stop