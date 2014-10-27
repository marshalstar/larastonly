@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('cidade')). ' ' .$city->name }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.cities.index')}}" title= "Volta a página de gerenciar título."> Gerenciar Cidades </a>
            / Visualizar Cidade.
            
          </p>
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ String::capitalize(Lang::get('cidade')) }}</h3></td>
                        <td><h3>{{ $city->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $city->id }}</h4></td>

                    <tr>
                        <td><h4>{{ Lang::get('city_id') }}</h4></td>
                        <td><h4>{{ $city->state_id }}</h4></td>

                </tbody>
            </table>
        </div>

    </div>
@stop