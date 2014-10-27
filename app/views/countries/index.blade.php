@extends('templates.index')
   <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
          	/ Gerenciar Países
          </p>
@section('title'){{ String::capitalize(Lang::get('países')) }} @stop

@section('create-url'){{ URL::route("admin.countries.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova country') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/countries/indexAjax @stop
@section('show-url'){{ URL::route("admin.countries.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.countries.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.countries.destroy', 'key') }} @stop