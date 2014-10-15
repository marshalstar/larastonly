@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar state')) }} @stop

@section('content')

@include('states.form')

@stop