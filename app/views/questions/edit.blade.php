@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Editar questão')) }} @stop

@section('content')

@include('questions.form')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('questions.index')}}" title= "Volta a página de gerenciar questão."> Gerenciar Questão </a>
			/ Editar Questão.
            
          </p>
@stop