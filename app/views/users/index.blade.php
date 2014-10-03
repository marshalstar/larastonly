@extends('templates.index')

@section('title'){{ Str::title(Lang::get('usuários')) }} @stop

@section('create-url'){{ URL::route("users.create") }} @stop
@section('text-create-button'){{ Lang::get('Novo usuário') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('ID') }}</th>
<th data-column-id="username" class="text-center">{{ Lang::get('Username') }}</th>
<th data-column-id="email" class="text-center">{{ Lang::get('E-Mail') }}</th>
<th data-column-id="speciality" class="text-center">{{ Lang::get('Especialidade') }}</th>
<th data-column-id="is_admin" class="text-center">{{ Lang::get('É administrador?') }}</th>
<th data-column-id="gender" class="text-center">{{ Lang::get('Sexo') }}</th>
<th data-column-id="biography" class="text-center">{{ Lang::get('Biografia') }}</th>
<th data-column-id="picture_url" class="text-center">{{ Lang::get('Url do Retrato') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/users/indexAjax @stop
@section('show-url'){{ URL::route("users.show", "key") }} @stop
@section('edit-url'){{ URL::route("users.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('users.destroy', 'key') }} @stop