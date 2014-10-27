@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('nova avaliação')) }} @stop

@section('content')

@include('evaluations.form')

@stop