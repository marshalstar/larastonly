@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar país')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.states.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Países </a>
			/ Editar País.
            
          </p>
@include('countries.form')

@stop