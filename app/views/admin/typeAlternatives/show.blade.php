@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('tipo')). ' ' .$type->name }} @stop

@section('content')

 <p id="breadCrumb">
     Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.typeAlternatives.index')}}" title= "Volta a página de gerenciar checklist."> Gerenciar Tipo</a>
            / Visualizar Tipo.
            
          </p>
    <div class="container container-main">
   
        <div class="table-responsive">
            <table class="table table-hover">
            <tbody>

                <tr>
                    <td><h3>{{ String::capitalize(Lang::get('tipo')) }}</h3></td>
                    <td><h3>{{ $type->name }}</h3></td>
                </tr>

                <tr>
                    <td><h4>{{ Lang::get('id') }}</h4></td>
                    <td><h4>{{ $type->id }}</h4></td>
                </tr>


            </tbody>
        </table>

    </div>

@stop