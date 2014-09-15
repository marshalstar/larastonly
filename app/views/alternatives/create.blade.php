@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('content')

<div class="container">
    <div class="content-header"><div class="header-inner"></div></div>{{-- header do corpo --}}
    <div class="stream-item js-new-items-bar-container">

        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['url' => 'alternatives']) }}

        <div class="form-group input-group">
            {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
            {{ Form::text('name', Input::old('name'), ['class' => 'form-control field', 'placeholder' => Lang::get('nome')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('type', Str::title(Lang::get('tipo')), ['class' => 'input-group-addon']) }}
            {{ Form::select('type_id', $types, Input::old('type_id'), ['class' => 'form-control']) }}
        </div>

        {{ Form::submit(Str::title(Lang::get('nova alternativa')), ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div>
    <div class="stream-end-inner"></div>{{-- footer do corpo --}}
</div>

@stop