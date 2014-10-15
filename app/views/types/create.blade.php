@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo tipo')) }} @stop

@section('content')

@include('types.form')

@stop