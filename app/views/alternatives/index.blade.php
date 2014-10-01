@extends('templates.bestindex')

@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('text-create-button'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('table-content')
<th data-column-id="id" data-type="numeric" data-identifier="true" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Name') }}</th>
<th data-column-id="type_id" class="text-center">{{ Lang::get('Type_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/alternatives/indexAjax @stop
@section('create-url-ajax'){{ URL::route("alternatives.show", "key") }} @stop
@section('edit-url-ajax'){{ URL::route("alternatives.edit", "key") }} @stop
@section('destroy-url-ajax'){{ URL::route('alternatives.destroy', 'key') }} @stop