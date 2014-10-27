@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('título')). ' ' .$title->name }} @stop

@section('content')
 <p id="breadCrumb">
     Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.titles.index')}}" title= "Volta a página de gerenciar títulos."> Gerenciar Títulos</a>
            / Visualizar Título.
            
          </p>
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ String::capitalize(Lang::get('Tag')) }}</h3></td>
                        <td><h3>{{ $title->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $title->id }}</h4></td>
                    </tr>
        
        <<tr>
        <td><<h4>{{Lang::get('Title_ID')}}</h4>></td>
        <td><<h4>{{$title->title_id}}</h4></td>
        </tr>
                </tbody>
            </table>
        </div>

    </div>

@stop