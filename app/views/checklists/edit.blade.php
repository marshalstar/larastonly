@extends('templates.default')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
				<a href="{{URL::route('checklists.index')}}" title= "Volta a página de gerenciar checklist."> Gerenciar Checklist. </a>
			/ Editar Checklist.
            
          </p>
@section('title'){{ Str::title(Lang::get('editar')). ' ' .$checklist->name }} @stop

@section('content')

@include('checklists.form')

@stop