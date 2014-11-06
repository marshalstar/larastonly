@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo checklist')) }} @stop

@section('content')

@include('admin.checklists.form')

@stop