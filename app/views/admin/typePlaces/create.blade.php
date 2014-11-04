@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo tipo de local')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('admin.typePlaces.index')}}" title= "Volta a página gerenciar tags"> Gerenciar Tipos de local </a>
            / Criar nova tag.
            
          </p>
@include('admin.typePlaces.form')

@stop