@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova place')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.places.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Locais </a>
			/ Criar Local.
            
          </p>
@include('places.form')

@stop