@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar tag')) }} @stop

@section('content')

@include('tags.form')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('titles.index')}}" title= "Volta a página de gerenciar tag."> Gerenciar Tag</a>
			/ Editar Tag
            
          </p>
@stop