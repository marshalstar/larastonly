@extends('templates.default')

@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('content')

<style type="text/css">
    body {
        margin: 0;
    }
    #layer1 {
        position: fixed;
        width: 100%;
        height: 2000px;
        top: 0;
        z-index: -999999;
    }
    #main {
        margin: 0 auto;
        max-width: 1920px;
        position: relative;
        top: -111px;
        width: 100%;
    }
</style>

<header class = "jumbotron subhead">
    <div class = "container">
        <h1>Listonly</h1>
        <p>Criação de Checklists</p>
    </div>
</header>

<div class="container" style="display: block; background-color: white; padding: 10px;">
    <div class="row">
        <aside class="span8">
            <ul class="nav">
                <li><a href="{{URL::route('alternatives.index')}}"><i class="icon-chevron-right"></i> Gerenciar Alternativas</li></a>
                <li><a href="{{URL::route('questions.index')}}"><i class="icon-chevron-right"></i> Gerenciar Questões</li></a>
                <li><a href="{{URL::route('checklists.index')}}"><i class="icon-chevron-right"></i> Gerenciar Checklist </li></a>
                <li><a href="{{URL::route('evaluations.index')}}"><i class="icon-chevron-right"></i>Gerenciar Avaliações</li></a>
                <li><a href="{{URL::route('tags.index')}}"><i class="icon-chevron-right"></i>Gerenciar Tags </li></a>
                <li><a href="{{URL::route('titles.index')}}"><i class="icon-chevron-right"></i>Gerenciar Títulos </li></a>
                <li><a href="{{URL::route('types.index')}}"><i class="icon-chevron-right"></i>Gerenciar Tipo </li></a>
                <li><a href="{{URL::route('users.index')}}"><i class="icon-chevron-right"></i>Gerenciar Perfil</li></a>
                @if(Auth::check())
                    <p> Bem-vindo, {{Auth::user()->username}} </p>
                @else
                    <p> Você não está logado </p>
                    @endif
                <li><a href="{{URL::route('users-login')}}"><i class="icon-chevron-right"></i>Faça seu Login</li></a>
                <li><a href="{{URL::route('users.create')}}"><i class="icon-chevron-right"></i>Ainda não está cadastrado? Crie sua conta.</li></a>
            </ul>
        </aside>
    </div>
</div>



@stop