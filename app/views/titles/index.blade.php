@extends('templates.index')

@section('title'){{ Str::title(Lang::get('títulos')) }} @stop
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Títulos. 

			
            
          </p>
@section('create-url'){{ URL::route("admin.titles.create") }} @stop
@section('text-create-button'){{ Lang::get('Novo Título') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/titles/indexAjax @stop
@section('show-url'){{ URL::route("admin.titles.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.titles.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.titles.destroy', 'key') }} @stop