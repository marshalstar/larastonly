@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova country')) }} @stop

@section('content')

@include('countries.form')

@stop