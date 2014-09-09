@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tag')). ' ' .$tag->name }} @stop

@section('content')

    <h1>{{ Str::title(Lang::get('tag')). ': ' .$tag->name }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$tag->id }}</h3>
    <h3>{{ Lang::get('name'). ': ' .$tag->name }}</h3>

@stop