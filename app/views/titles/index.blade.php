@extends('templates.index')

@section('title'){{ Str::title(Lang::get('títulos')) }} @stop

@section('create-url'){{ URL::route("titles.create") }} @stop
@section('text-create-button'){{ Lang::get('Novo Título') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/titles/indexAjax @stop
@section('show-url'){{ URL::route("titles.show", "key") }} @stop
@section('edit-url'){{ URL::route("titles.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('titles.destroy', 'key') }} @stop