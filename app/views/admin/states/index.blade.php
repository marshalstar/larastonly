@extends('templates.index')
   <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
          	/ Gerenciar Estados
          </p>
@section('title'){{ String::capitalize(Lang::get('states')) }} @stop

@section('create-url'){{ URL::route("admin.states.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova state') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="country_id" class="text-center">{{ Lang::get('country_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax'){{ URL::route("admin.states.index.ajax") }} @stop
@section('show-url'){{ URL::route("admin.states.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.states.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.states.destroy', 'key') }} @stop