@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar avaliação')) }} @stop

@section('content')

@include('evaluations.form')

@stop