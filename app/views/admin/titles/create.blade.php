@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo título')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('admin.title.index')}}" title= "Volta a página gerenciar títulos"> Gerenciar Títulos </a>
            / Criar novo título.
            
          </p>
@include('admin.titles.form')

@stop