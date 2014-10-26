@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo tipo')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.types.index')}}" title= "Volta a página de gerenciar checklist."> Gerenciar Tipo </a>
			/ Criar Tipo.
            
          </p>
@include('types.form')

@stop