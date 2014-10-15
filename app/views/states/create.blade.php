@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova state')) }} @stop

@section('content')

@include('states.form')

@stop