@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo título')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('admin.types.index')}}" title= "Volta a página gerenciar títulos"> Gerenciar Títulos </a>
            / Criar novo título.
            
          </p>
@include('titles.form')

@stop