@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo título')) }} @stop

@section('content')

@include('titles.form')

@stop