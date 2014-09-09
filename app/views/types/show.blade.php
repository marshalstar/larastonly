@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tipo')). ' ' .$type->name }} @stop

@section('content')

    <h1>{{ Str::title(Lang::get('tipo')). ': ' .$type->name }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$type->id }}</h3>
    <h3>{{ Lang::get('nome'). ': ' .$type->name }}</h3>

@stop