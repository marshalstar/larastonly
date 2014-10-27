@extends('templates.default')

@section('title'){{ Str::title(Lang::get('place')). ' ' .$place->name }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.states.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Estados </a>
            / Visualizar Estado.
            
          </p>
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('place')) }}</h3></td>
                        <td><h3>{{ $place->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $place->id }}</h4></td>

                    <tr>
                        <td><h4>{{ Lang::get('city_id') }}</h4></td>
                        <td><h4>{{ $place->city_id }}</h4></td>

                    <tr>
                        <td><h4>{{ Lang::get('tag_id') }}</h4></td>
                        <td><h4>{{ $place->tag_id }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@stop