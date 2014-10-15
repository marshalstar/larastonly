@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar')). ' ' .$alternative->name }} @stop

@section('content')

@include('alternatives.form')

@stop