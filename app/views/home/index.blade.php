@extends('templates.default')

@section('content')

<div class="container container-main">
      <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
          </p>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Listonly</i></h1>

    <div class="panel">

        @if(Auth::check() && Auth::user()->is_admin)
            <p> Bem-vindo(a), {{Auth::user()->username}}</p>
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
            <li><a href="{{URL::route('admin.checklists.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Checklist </a></li>
            <li><a href="{{URL::route('admin.alternatives.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Alternativas</a></li>
            <li><a href="{{URL::route('admin.questions.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Questões</a></li>
            <li><a href="{{URL::route('admin.evaluations.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Avaliações</a></li>
            <li><a href="{{URL::route('admin.tags.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tags </a></li>
            <li><a href="{{URL::route('admin.titles.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Títulos </a></li>
            <li><a href="{{URL::route('admin.types.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tipo </a></li>
      </div>
    </div>
  </div>
</div>
        @elseif(Auth::check())
        <p> Bem-vindo(a), {{Auth::user()->username}}</p>
                  <div class="panel-group" id="gerenciarTudo">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#gerenciarTudo" href="#gerenciarPerfil">
          Gerenciar Perfil
        </a>
      </h4>
    </div>
    <div id="gerenciarPerfil" class="panel-collapse collapse in">
      <div class="panel-body">
        <li><a href="{{URL::route('editUser',Auth::user()->id)}}"><i class="fa fa-pencil-square-o"></i> Editar Perfil</a></li>
       <li><a href="{{URL::route('changepassword')}}"> <i class="fa fa-pencil-square-o"></i> Mudar minha senha </a></li>
       <li><a href="{{URL::route('logout')}}"><i class="fa fa-sign-out"></i> Sair </a></li>
      </div>
    </div>
  </div>

        @else
           <p> Você ainda não fez seu login.</p>
           <ul>
          <li><a href="{{URL::route('users.login')}}"><i class="fa fa-sign-in"></i> Faça seu Login </a> ou <a href="/fb"><i class="fa fa-facebook-square"></i> Login Via Facebook </a>
           

           </ul>
        @endif

    </div>
</div>
@stop