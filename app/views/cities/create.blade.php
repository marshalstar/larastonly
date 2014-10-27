@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('nova cidade')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.cities.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Cidades </a>
			/ Criar Cidade.
            
          </p>
@include('cities.form')

@stop