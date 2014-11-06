@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo usuário')) }} @stop

@section('content')
 <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.users.index')}}" title= "Volta a página de gerenciar perfis."> Gerenciar Perfis </a>
			/ Editar Perfil.
            
          </p>
@include('admin.users.form')

@stop