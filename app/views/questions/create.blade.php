@extends('templates.default')

@section('title'){{ Str::title(Str::title(Lang::get('Nova questão'))) }} @stop

@section('content')

@include('questions.form')

@stop