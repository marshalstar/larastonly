@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar')). ' ' .$alternative->name }} @stop

@section('content')

@include('alternatives.form')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.alternatives.index')}}" title= "Volta a página de gerenciar alternativa."> Gerenciar Alternativa. </a>
			/ Editar Alternativa.
            
          </p>
@stop