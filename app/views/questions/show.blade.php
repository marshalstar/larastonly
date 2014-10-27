@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('questão')). ' ' .$question->statement }} @stop

@section('content')
 <p id="breadCrumb">
     Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.questions.index')}}" title= "Volta a página de gerenciar questão"> Gerenciar Questão.</a>
            / Visualizar Questão.
            
          </p>
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ String::capitalize(Lang::get('Enunciado')) }}</h3></td>
                        <td><h3>{{ $question->statement}}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $question->id }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Enunciad') }}</h4></td>
                        <td><h4>{{ $question->statement }}</h4></td>
                    </tr>
    
                     <tr>
                        <td><h4>{{ Lang::get('Title_id') }}</h4></td>
                        <td><h4>{{ $question->title_id }}</h4></td>
                    </tr>
                    <tr>
                        <td><<h4>{{ Lang::get('Peso')}}</h4></td>
                        <td><h4>{{ $question->weight}}</h4></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@stop