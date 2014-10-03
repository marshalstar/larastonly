@extends('templates.index')

@section('title'){{ Str::title(Lang::get('países')) }} @stop

@section('create-url'){{ URL::route("countries.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova country') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/countries/indexAjax @stop
@section('show-url'){{ URL::route("countries.show", "key") }} @stop
@section('edit-url'){{ URL::route("countries.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('countries.destroy', 'key') }} @stop