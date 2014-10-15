@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Editar questão')) }} @stop

@section('content')

@include('questions.form')

@stop