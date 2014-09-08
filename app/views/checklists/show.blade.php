@extends('templates.default')

@section('title'){{ Lang::get('Checklist'). ' ' .$checklist->name }} @stop

@section('content')

    <h1>{{ Lang::get('Checklist'). ': ' .$checklist->name }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$checklist->id }}</h3>
    <h3>{{ Lang::get('nome'). ': ' .$checklist->name }}</h3>
    <h3>{{ Lang::get('user_id'). ': ' .$checklist->user_id }}</h3>
    <h3>{{ Lang::get('title_id'). ': ' .$checklist->title_id }}</h3>
    <h3>{{ Lang::get('criado em'). ': ' .$checklist->created_at->format('d/m/Y') }}</h3>
    <h3>{{ Lang::get('atualizado a'). ': ' .$checklist->updated_at->diffForHumans() }}</h3>

@stop