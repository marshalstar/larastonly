@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Nova questão')) }} @stop

@section('content')

@include('questions.form')

@stop