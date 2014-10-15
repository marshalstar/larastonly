@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar tag')) }} @stop

@section('content')

@include('tags.form')

@stop