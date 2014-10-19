@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo usuário')) }} @stop

@section('content')

@include('users.form')
 <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('users.login')}}" title = "Voltar a página de login"> Login </a>
            / Criar nova conta.
          </p>
@stop