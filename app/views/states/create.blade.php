@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('nova state')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.states.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Estados </a>
			/ Criar Estado.
            
          </p>
@include('states.form')

@stop