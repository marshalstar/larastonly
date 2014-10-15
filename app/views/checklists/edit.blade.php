@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar')). ' ' .$checklist->name }} @stop

@section('content')

@include('checklists.form')

@stop