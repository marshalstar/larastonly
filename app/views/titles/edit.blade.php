@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo título')) }} @stop

@section('content')

@include('titles.form')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('titles.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Título</a>
			/ Editar Título.
            
          </p>
@stop