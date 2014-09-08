@extends('templates.default')

@section('title'){{ Str::title(Lang::get('título')). ' ' .$title->name }} @stop

@section('content')

    <h1>{{ Str::title(Lang::get('título')). ': ' .$title->name }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$title->id }}</h3>
    <h3>{{ Lang::get('nome'). ': ' .$title->name }}</h3>
    <h3>{{ Lang::get('title_id'). ': ' .(($pai = $title->title_id)? $pai : Lang::get('sem pai')) }}</h3>

@stop