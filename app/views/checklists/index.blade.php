@extends('templates.bestindex')

@section('title'){{ Str::title(Lang::get('checklists')) }} @stop

@section('text-create-button'){{ Lang::get('Novo Checklist') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="name" class="text-center">{{ Lang::get('Name') }}</th>
<th data-column-id="title_id" class="text-center">{{ Lang::get('Title_id') }}</th>
<th data-column-id="user_id" class="text-center">{{ Lang::get('User_id') }}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/checklists/indexAjax @stop
@section('create-url-ajax'){{ URL::route("checklists.show", "key") }} @stop
@section('edit-url-ajax'){{ URL::route("checklists.edit", "key") }} @stop
@section('destroy-url-ajax'){{ URL::route('checklists.destroy', 'key') }} @stop