@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova alternativa')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.alternatives.index')}}" title= "Volta a página de gerenciar alternativa."> Gerenciar Alternativa. </a>
			/ Criar Alternativa.
            
          </p>
@include('alternatives.form')

@stop