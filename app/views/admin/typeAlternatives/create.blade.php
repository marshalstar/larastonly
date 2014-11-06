@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo tipo')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.typeAlternatives.index')}}" title= "Volta a página de gerenciar checklist."> Gerenciar Tipo </a>
			/ Criar Tipo.
            
          </p>
@include('admin.typeAlternatives.form')

@stop