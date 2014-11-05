@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('editar tag')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('admin.titles.index')}}" title= "Volta a página de gerenciar tag."> Gerenciar Tag</a>
			/ Editar Tag
            
          </p>
@include('admin.typePlaces.form')
@stop