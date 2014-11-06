@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('nova country')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.countries.index')}}" title= "Volta a página de gerenciar título."> Gerenciar País</a>
			/ Criar País.
            
          </p>
@include('admin.countries.form')

@stop