@extends('templates.default')

@section('title'){{ Str::title(Lang::get('avaliação')). ' ' .$evaluation->name }} @stop

@section('content')

    <h1>{{ Str::title(Lang::get('avaliação')). ': ' .$evaluation->name }}</h1>

    <h3>{{ Lang::get('id'). ': ' .$evaluation->id }}</h3>
    <h3>{{ Lang::get('comentário'). ': ' .$evaluation->commentary }}</h3>
    <h3>{{ Lang::get('user_id'). ': ' .$evaluation->user_id }}</h3>
    <h3>{{ Lang::get('checklist_id'). ': ' .$evaluation->checklist_id }}</h3>
    <h3>{{ Lang::get('criado em'). ': ' .$evaluation->created_at->format('d/m/Y') }}</h3>
    <h3>{{ Lang::get('atualizado a'). ': ' .$evaluation->updated_at->diffForHumans() }}</h3>

@stop