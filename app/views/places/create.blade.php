@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova place')) }} @stop

@section('content')

@include('places.form')

@stop