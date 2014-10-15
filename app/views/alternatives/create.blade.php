@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('content')

@include('alternatives.form')

@stop