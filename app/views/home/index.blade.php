@extends('templates.default')

@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Listonly</h1>

    <div class="panel">

        @if(Auth::check())
            <p> Bem-vindo, {{Auth::user()->username}}</p>
            <ul>
            <li><a href="{{URL::route('users.logout')}}"> <i class="icon-chevron-right"></i> Sair </a></li>
            <li><a href="{{URL::route('changepassword')}}"> Mudar minha senha </a></li>
            <li><a href="{{URL::route('alternatives.index')}}"><i class="icon-chevron-right"></i> Gerenciar Alternativas</a></li>
            <li><a href="{{URL::route('questions.index')}}"><i class="icon-chevron-right"></i> Gerenciar Questões</a></li>
            <li><a href="{{URL::route('checklists.index')}}"><i class="icon-chevron-right"></i> Gerenciar Checklist </a></li>
            <li><a href="{{URL::route('evaluations.index')}}"><i class="icon-chevron-right"></i>Gerenciar Avaliações</a></li>
            <li><a href="{{URL::route('tags.index')}}"><i class="icon-chevron-right"></i>Gerenciar Tags </a></li>
            <li><a href="{{URL::route('titles.index')}}"><i class="icon-chevron-right"></i>Gerenciar Títulos </a></li>
            <li><a href="{{URL::route('types.index')}}"><i class="icon-chevron-right"></i>Gerenciar Tipo </a></li>
            <li><a href="{{URL::route('users.index')}}"><i class="icon-chevron-right"></i>Gerenciar Perfil</a></li>
            </ul>
        @else
           <p> Você ainda não fez seu login.</p>
           <ul>
           <li><a href="{{URL::route('users.login')}}"><i class="icon-chevron-right"></i>Faça seu Login</a></li>
           <li><a href="{{URL::route('users.create')}}"><i class="icon-chevron-right"></i>Ainda não está cadastrado? Crie sua conta.</a></li>
           </ul>
        @endif
        @if(!empty($data))
            Olá, {{{$data['name']}}}
            <a href="logout"> Logout</a>
        @else
            <a href="/users/login/fb"> Logar com face </a>
        @endif

    </div>

</div>
@stop