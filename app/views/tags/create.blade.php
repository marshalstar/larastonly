@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova tag')) }} @stop

@section('content')

@include('tags.form')

@stop