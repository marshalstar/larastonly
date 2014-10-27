@extends('templates.index')

@section('title'){{ String::capitalize(Lang::get('tipos')) }} @stop
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Tipos. 

			
            
          </p>
@section('create-url'){{ URL::route("admin.types.create") }} @stop
@section('text-create-button'){{ Lang::get('Novo Tipo') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax'){{ URL::route("admin.types.index.ajax") }} @stop
@section('show-url'){{ URL::route("admin.types.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.types.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.types.destroy', 'key') }} @stop