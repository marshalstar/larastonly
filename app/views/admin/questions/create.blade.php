@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Nova questão')) }} @stop

@section('content')

@include('admin.questions.form')

@stop