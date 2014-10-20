@extends('templates.index')

@section('title'){{ Str::title(Lang::get('tags')) }} @stop
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Tag. 

			
            
          </p>
@section('create-url'){{ URL::route("tags.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova Tag') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/tags/indexAjax @stop
@section('show-url'){{ URL::route("tags.show", "key") }} @stop
@section('edit-url'){{ URL::route("tags.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('tags.destroy', 'key') }} @stop