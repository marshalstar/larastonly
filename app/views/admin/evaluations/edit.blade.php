@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('editar avaliação')) }} @stop

@section('content')
 <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('admin.evaluations.index')}}" title= "Volta a página gerenciar avaliação."> Gerenciar Avaliação. </a>
            / Editar avaliação.
            
          </p>
@include('evaluations.form')

@stop