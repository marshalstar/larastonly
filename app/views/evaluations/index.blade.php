@extends('templates.index')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Avaliação. 

			
            
          </p>
@section('title'){{ Str::title(Lang::get('avaliações')) }} @stop

@section('create-url'){{ URL::route("admin.evaluations.create") }} @stop
@section('text-create-button'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="commentary" class="text-center">{{ Lang::get('Comentário') }}</th>
<th data-column-id="user_id" class="text-center">{{ Lang::get('User_id') }}</th>
<th data-column-id="checklist_id" class="text-center">{{Lang::get('Checklist_id')}}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/evaluations/indexAjax @stop
@section('show-url'){{ URL::route("admin.evaluations.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.evaluations.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.evaluations.destroy', 'key') }} @stop