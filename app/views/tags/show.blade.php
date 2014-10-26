@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tag')). ' ' .$tag->name }} @stop

@section('content')
 <p id="breadCrumb">
     Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.tags.index')}}" title= "Volta a página de gerenciar tag"> Gerenciar Tag</a>
            / Visualizar Tag.
            
          </p>
<div class="container container-main">

        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>

                    <tr>
                        <td><h3>{{ Str::title(Lang::get('Tag')) }}</h3></td>
                        <td><h3>{{ $tag->name }}</h3></td>
                    </tr>

                    <tr>
                        <td><h4>{{ Lang::get('ID') }}</h4></td>
                        <td><h4>{{ $tag->id }}</h4></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
@stop