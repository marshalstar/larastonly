@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo usuário')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
			 / Criar nova conta.
          </p>
@include('users.form')
 
@stop