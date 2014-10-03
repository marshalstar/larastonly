@extends('templates.index')

@section('title'){{ Str::title(Lang::get('avaliações')) }} @stop

@section('create-url'){{ URL::route("evaluations.create") }} @stop
@section('text-create-button'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="commentary" class="text-center">{{ Lang::get('Comentário') }}</th>
<th data-column-id="user_id" class="text-center">{{ Lang::get('User_id') }}</th>
<th data-column-id="checklist_id" class="text-center">{{Lang::get('Checklist_id')}}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/evaluations/indexAjax @stop
@section('show-url'){{ URL::route("evaluations.show", "key") }} @stop
@section('edit-url'){{ URL::route("evaluations.edit", "key") }} @stop
@section('destroy-url'){{ URL::route('evaluations.destroy', 'key') }} @stop