@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Editar questão')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.questions.index')}}" title= "Volta a página de gerenciar questão."> Gerenciar Questão </a>
			/ Editar Questão.
            
          </p>
@include('questions.form')

@stop