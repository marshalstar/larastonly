@extends('templates.index')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Pesquisar Checklist. 

			
            
          </p>
@section('title'){{ String::capitalize(Lang::get('checklists')) }} @stop

@section('create-url'){{ URL::route("admin.checklists.create") }} @stop
@section('text-create-button'){{ String::capitalize(Lang::get('novo checklist')) }} @stop

@section('table-content')
<th data-column-id="user_id" class="text-center">{{ Lang::get('Usuario [nome]') }}</th>
<th data-column-id="namea" class="text-center">{{ Lang::get('Name') }}</th>
<th data-column-id="commands" data-formatter="" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax'){{ URL::route("admin.checklists.index.ajax") }} @stop
@section('show-url'){{ URL::route("checklists.answer.create", "key") }} @stop
