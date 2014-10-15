@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova avaliação')) }} @stop

@section('content')

@include('evaluations.form')

@stop