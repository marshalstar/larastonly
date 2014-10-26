@extends('templates.index')

@section('title'){{ Str::title(Lang::get('places')) }} @stop

@section('create-url'){{ URL::route("admin.places.create") }} @stop
@section('text-create-button'){{ Lang::get('Nova place') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="tag_id" class="text-center">{{ Lang::get('tag_id') }}</th>
<th data-column-id="city_id" class="text-center">{{ Lang::get('city_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/places/indexAjax @stop
@section('show-url'){{ URL::route("places.show", "key") }} @stop
@section('edit-url'){{ URL::route("places.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('places.destroy', 'key') }} @stop