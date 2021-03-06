@extends('templates.index')

@section('title'){{ String::capitalize(Lang::get('usuários')) }} @stop

@section('create-url'){{ URL::route("admin.users.create") }} @stop
@section('text-create-button'){{ Lang::get('Novo usuário') }}@stop
 <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Gerenciar Perfis.

          </p>
@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('ID') }}</th>
<th data-column-id="username" class="text-center">{{ Lang::get('Username') }}</th>
<th data-column-id="email" class="text-center">{{ Lang::get('E-Mail') }}</th>
<th data-column-id="speciality" class="text-center">{{ Lang::get('Especialidade') }}</th>
<th data-column-id="is_admin" class="text-center">{{ Lang::get('É administrador?') }}</th>
<th data-column-id="gender" class="text-center">{{ Lang::get('Sexo') }}</th>
<th data-column-id="biography" class="text-center">{{ Lang::get('Biografia') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax'){{ URL::route("admin.users.index.ajax") }} @stop
@section('show-url'){{ URL::route("admin.users.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.users.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.users.destroy', 'key') }} @stop
