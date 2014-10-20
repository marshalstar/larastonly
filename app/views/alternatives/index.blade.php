@extends('templates.index')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Alternativa. 

			
            
          </p>
@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('create-url'){{ URL::route("alternatives.create") }} @stop
@section('text-create-button'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('table-content')
<th data-column-id="id" data-type="numeric" data-identifier="true" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Name') }}</th>
<th data-column-id="type_id" class="text-center">{{ Lang::get('Type_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/alternatives/indexAjax @stop
@section('show-url'){{ URL::route("alternatives.show", "key") }} @stop
@section('edit-url'){{ URL::route("alternatives.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('alternatives.destroy', 'key') }} @stop