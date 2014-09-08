@extends('templates.default')

@section('title'){{ Str::title(Lang::get('questão')). ' ' .$question->statement }} @stop

@section('content')

    <h1>{{ Str::title(Lang::get('questão')). ': ' .$question->statement }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$question->id }}</h3>
    <h3>{{ Lang::get('enunciado'). ': ' .$question->statement }}</h3>
    <h3>{{ Lang::get('title_id'). ': ' .$question->title_id }}</h3>
    <h3>{{ Lang::get('é sobre avaliado'). '? ' .$question->is_about_assessable? Lang::get('sim') : Lang::get('não') }}</h3>
    <h3>{{ Lang::get('peso'). ': ' .$question->weight }}</h3>

@stop