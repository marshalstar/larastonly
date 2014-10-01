@extends('templates.bestindex')

@section('title'){{ Str::title(Lang::get('avaliações')) }} @stop

@section('text-create-button'){{ Lang::get('Novo Avaliação') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="commentary" class="text-center">{{ Lang::get('Comentário') }}</th>
<th data-column-id="user_id" class="text-center">{{ Lang::get('User_id') }}</th>
<th data-column-id="checklist_id" class="text-center">{{Lang::get('Checklist_id')}}</th>
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/evaluations/indexAjax @stop
@section('create-url-ajax'){{ URL::route("evaluations.show", "key") }} @stop
@section('edit-url-ajax'){{ URL::route("evaluations.edit", "key") }} @stop
@section('destroy-url-ajax'){{ URL::route('evaluations.destroy', 'key') }} @stop