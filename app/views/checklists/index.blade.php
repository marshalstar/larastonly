@extends('templates.index')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Checklist. 

			
            
          </p>
@section('title'){{ Str::title(Lang::get('checklists')) }} @stop

@section('create-url'){{ URL::route("admin.checklists.create") }} @stop
@section('text-create-button'){{ Str::title(Lang::get('novo checklist')) }} @stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Name') }}</th>
<th data-column-id="title_id" class="text-center">{{ Lang::get('Title_id') }}</th>
<th data-column-id="user_id" class="text-center">{{ Lang::get('User_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/checklists/indexAjax @stop
@section('show-url'){{ URL::route("admin.checklists.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.checklists.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.checklists.destroy', 'key') }} @stop