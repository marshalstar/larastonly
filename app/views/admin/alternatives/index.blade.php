@extends('templates.index')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Alternativa. 

			
            
          </p>
@section('title'){{ String::capitalize(Lang::get('alternativas')) }} @stop

@section('create-url'){{ URL::route("admin.alternatives.create") }} @stop
@section('text-create-button'){{ String::capitalize(Lang::get('nova alternativa')) }} @stop

@section('table-content')
<th data-column-id="id" data-type="numeric" data-identifier="true" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Name') }}</th>
<th data-column-id="type_id" class="text-center">{{ Lang::get('Type_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax'){{ URL::route("admin.alternatives.index.ajax") }} @stop
@section('show-url'){{ URL::route("admin.alternatives.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.alternatives.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.alternatives.destroy', 'key') }} @stop