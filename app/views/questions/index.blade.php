@extends('templates.bestindex')

@section('title'){{ Str::title(Lang::get('questões')) }} @stop

@section('text-create-button'){{ Lang::get('Nova Questão') }}@stop

@section('table-content')
<th data-column-id="id" class="text-center">{{ Lang::get('Id') }}</th>
<th data-column-id="statement" class="text-center">{{ Lang::get('Enunciado') }}</th>
<th data-column-id="title_id" class="text-center">{{ Lang::get('Título_id') }}</th>
<th data-column-id="is_about_assessable" class="text-center">{{ Lang::get('É sobre avaliado?')}}
<th data-column-id="weight" class="text-center">{{ Lang::get('Peso')}}
<th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
@stop

@section('data-url-ajax')/questions/indexAjax @stop
@section('create-url-ajax'){{ URL::route("questions.show", "key") }} @stop
@section('edit-url-ajax'){{ URL::route("questions.edit", "key") }} @stop
@section('destroy-url-ajax'){{ URL::route('questions.destroy', 'key') }} @stop