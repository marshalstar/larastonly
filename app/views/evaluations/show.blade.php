@extends('templates.default')
<p id="breadCrumb">
     Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.evaluations.index')}}" title= "Volta a página de gerenciar avaliação."> Gerenciar Avaliação.</a>
            / Visualizar Avaliação.
            
          </p>
@section('title'){{ Str::title(Lang::get('avaliação')). ' ' .$evaluation->name }} @stop

@section('content')
 <div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('Avaliação')) }}</h3></td>
                        <td><h3>{{ $evaluation->commentary }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $evaluation->id }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('Descrição') }}</h4></td>
                        <td><h4>{{ $evaluation->commentary }}</h4></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('User_id') }}</h4></td>
                        <td><h4>{{ $evaluation->user_id }}</h4></td>
                    </tr>
    
         <tr>
                        <td><h4>{{ Lang::get('Checklist_id') }}</h4></td>
                        <td><h4>{{ $evaluation->checklist_id }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@stop