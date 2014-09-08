@extends('templates.default')

@section('title')Alternativa: {{ $alternative->name }} @stop

@section('content')

    <h1>Alternativa {{ $alternative->name }}</h1>

    <h3>id: {{ $alternative->id }}</h3>
    <h3>nome: {{ $alternative->name }}</h3>
    <h3>type_id: {{ $alternative->type_id }}</h3>

@stop