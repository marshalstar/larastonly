@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar avaliação')) }} @stop

@section('content')

@include('evaluations.form')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('evaluations.index')}}" title= "Volta a página de gerenciar avaliação."> Gerenciar Avaliação. </a>
			/ Editar Avaliação.
            
          </p>
@stop