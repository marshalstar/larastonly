@extends('templates.bestindex')

@section('title'){{ Str::title(Lang::get('tipos')) }} @stop

@section('text-create-button'){{ Lang::get('Novo Tipo') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Nome') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/types/indexAjax @stop
@section('create-url-ajax'){{ URL::route("types.show", "key") }} @stop
@section('edit-url-ajax'){{ URL::route("types.edit", "key") }} @stop
@section('destroy-url-ajax'){{ URL::route('types.destroy', 'key') }} @stop