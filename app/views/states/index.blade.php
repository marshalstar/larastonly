@extends('templates.index')

@section('title'){{ Str::title(Lang::get('states')) }} @stop

@section('create-url'){{ URL::route("admin.states.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova state') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="country_id" class="text-center">{{ Lang::get('country_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/states/indexAjax @stop
@section('show-url'){{ URL::route("admin.states.show", "key") }} @stop
@section('edit-url'){{ URL::route("admin.states.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('admin.states.destroy', 'key') }} @stop