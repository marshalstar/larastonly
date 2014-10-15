@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar place')) }} @stop

@section('content')

@include('places.form')

@stop