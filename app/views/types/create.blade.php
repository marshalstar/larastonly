@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo tipo')) }} @stop

@section('content')

    <div class="container container-main">

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['url' => 'types']) }}

        <div class="form-group input-group">
            {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
            {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
        </div>

        {{ Form::submit(Str::title(Lang::get('novo tipo')), ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div>

@stop