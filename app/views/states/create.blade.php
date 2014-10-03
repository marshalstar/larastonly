@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova state')) }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'states']) }}

    <div class="form-group input-group">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('country_id', Str::title(Lang::get('país')), ['class' => 'input-group-addon']) }}
        {{ Form::select('country_id', $countries, Input::old('country_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('nova state')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop