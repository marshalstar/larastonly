@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('editar place')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.states.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Estados </a>
			/ Editar Local.
            
          </p>
@include('places.form')

@stop