@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova cidade')) }} @stop

@section('content')

@include('cities.form')

@stop