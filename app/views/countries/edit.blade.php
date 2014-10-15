@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar país')) }} @stop

@section('content')

@include('countries.form')

@stop