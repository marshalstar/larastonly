@extends('templates.index')

@section('title'){{ Str::title(Lang::get('cities')) }} @stop

@section('create-url'){{ URL::route("admin.cities.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova cidade') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="state_id" class="text-center">{{ Lang::get('state_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/cities/indexAjax @stop
@section('show-url'){{ URL::route("admin.cities.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.cities.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.cities.destroy', 'key') }} @stop