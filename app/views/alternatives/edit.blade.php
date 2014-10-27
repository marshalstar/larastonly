@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('editar')). ' ' .$alternative->name }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.alternatives.index')}}" title= "Volta a página de gerenciar alternativa."> Gerenciar Alternativa. </a>
			/ Editar Alternativa.
            
          </p>
@include('alternatives.form')

@stop