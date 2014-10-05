@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova state')) }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'states', 'class' => 'form-inline', 'role' => 'form']) }}

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'sr-only']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('country_id', Str::title(Lang::get('país')), ['class' => 'sr-only']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('country_id', $countries, Input::old('country_id'), ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div>

    {{ Form::submit(Str::title(Lang::get('nova lugar')), ['class' => 'btn btn-primary']) }}
    {{ Form::reset(Str::title(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}

    {{ Form::close() }}
</div>
@stop