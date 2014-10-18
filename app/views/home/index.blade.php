@extends('templates.default')

@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Listonly</i></h1>

    <div class="panel">

        @if(Auth::check())
            <p> Bem-vindo, {{Auth::user()->username}}</p>
           <div class="panel-group" id="gerenciarTudo">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#gerenciarTudo" href="#gerenciarPerfil">
          Gerenciar Perfis
        </a>
      </h4>
    </div>
    <div id="gerenciarPerfil" class="panel-collapse collapse in">
      <div class="panel-body">
        <li><a href="{{URL::route('users.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Perfis </a></li>
       <li><a href="{{URL::route('changepassword')}}"> <i class="fa fa-pencil-square-o"></i> Mudar minha senha </a></li>
       <li><a href="{{URL::route('logout')}}"><i class="fa fa-sign-out"></i> Sair </a></li>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#gerenciarTudo" href="#gerenciarChecklist">
          Gerenciar Checklist
        </a>
      </h4>
    </div>
    <div id="gerenciarChecklist" class="panel-collapse collapse">
      <div class="panel-body">
            <li><a href="{{URL::route('checklists.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Checklist </a></li>
            <li><a href="{{URL::route('alternatives.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Alternativas</a></li>
            <li><a href="{{URL::route('questions.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Questões</a></li>
            <li><a href="{{URL::route('evaluations.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Avaliações</a></li>
            <li><a href="{{URL::route('tags.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tags </a></li>
            <li><a href="{{URL::route('titles.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Títulos </a></li>
            <li><a href="{{URL::route('types.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tipo </a></li>
      </div>
    </div>
  </div>
</div>
        @else
           <p> Você ainda não fez seu login.</p>
           <ul>
          <li><a href="{{URL::route('users.login')}}"><i class="fa fa-sign-in"></i> Faça seu Login </a></li> ou <li><a href="{{URL::route('users.create')}}"><i class="fa fa-check-square-o"></i> Login via Facebook </a></li>
           

           </ul>
        @endif

    </div>

</div>
@stop