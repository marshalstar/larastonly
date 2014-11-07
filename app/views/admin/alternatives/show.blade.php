@extends('templates.default')
<p id="breadCrumb">
     Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.alternatives.index')}}" title= "Volta a página de gerenciar avaliação."> Gerenciar Alternativa.</a>
            / Visualizar Alternativa.
            
          </p>
@section('title'){{ String::capitalize(Lang::get('alternativa')). ' ' .$alternative->name }} @stop

@section('content')

    <div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ String::capitalize(Lang::get('alternativa')) }}</h3></td>
                        <td><h3>{{ $alternative->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $alternative->id }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Nome') }}</h4></td>
                        <td><h4>{{ $alternative->name }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

@stop