@extends('templates.default')

@section('title'){{ Str::title(Lang::get('alternativa')). ' ' .$alternative->name }} @stop

@section('content')

    <h1>{{ Str::title(Lang::get('alternativa')). ' ' .$alternative->name }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$alternative->id }}</h3>
    <h3>{{ Lang::get('nome'). ': ' .$alternative->name }}</h3>
    <h3>{{ Lang::get('type_id'). ': ' .$alternative->type_id }}</h3>

@stop