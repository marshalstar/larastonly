@extends('templates.bestindex')

@section('title'){{ Str::title(Lang::get('tags')) }} @stop

@section('text-create-button'){{ Lang::get('Nova Tag') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/tags/indexAjax @stop
@section('create-url-ajax'){{ URL::route("tags.show", "key") }} @stop
@section('edit-url-ajax'){{ URL::route("tags.edit", "key") }} @stop
@section('destroy-url-ajax'){{ URL::route('tags.destroy', 'key') }} @stop