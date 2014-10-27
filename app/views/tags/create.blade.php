@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova tag')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('admin.tags.index')}}" title= "Volta a página gerenciar tags"> Gerenciar Tags </a>
            / Criar nova tag.
            
          </p>
@include('tags.form')

@stop