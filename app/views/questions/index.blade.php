@extends('templates.index')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Questão. 

			
            
          </p>
@section('title'){{ Str::title(Lang::get('questões')) }} @stop

@section('create-url'){{ URL::route("admin.questions.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova Questão') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="statement" class="text-center">{{ Lang::get('Enunciado') }}</th>
<th data-column-id="title_id" class="text-center">{{ Lang::get('Título_id') }}</th>
<th data-column-id="weight" class="text-center">{{ Lang::get('Peso')}}
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/questions/indexAjax @stop
@section('show-url'){{ URL::route("questions.show", "key") }} @stop
@section('edit-url'){{ URL::route("questions.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('questions.destroy', 'key') }} @stop