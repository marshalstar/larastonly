@extends('templates.default')

@section('title'){{ Lang::get('Avaliação'). ' ' .$question->name }} @stop

@section('content')

    <h1>{{ Lang::get('Avaliação'). ': ' .$question->name }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$question->id }}</h3>
    <h3>{{ Lang::get('enunciado'). ': ' .$question->statement }}</h3>
    <h3>{{ Lang::get('título'). ': ' .$question->title_id }}</h3>

@stop