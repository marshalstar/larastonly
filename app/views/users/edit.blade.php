@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo usuário')) }} @stop

@section('content')
 <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('users.index')}}" title= "Volta a página de gerenciar perfis."> Gerenciar Perfis </a>
			/ Editar Perfil.
            
          </p>
@include('users.form')

@stop