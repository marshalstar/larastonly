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

  <h1>Listonly</h1>

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
            <li><a href="{{URL::route('admin.users.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Perfis </a></li>
            <li><a href="{{URL::route('password.edit')}}"> <i class="fa fa-pencil-square-o"></i> Mudar minha senha </a></li>
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
              <li><a href="{{URL::route('admin.typePlaces.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tipos de Lugar </a></li>
              <li><a href="{{URL::route('admin.titles.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Títulos </a></li>

              <!-- <li><a href="{{URL::route('admin.typeQuestions.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tipo </a></li> -->

              <li><a href="{{URL::route('checklists.create')}}"><i class="fa fa-pencil-square-o"></i> Montar Checklist </a></li>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#gerenciarTudo" href="#gerenciarLocais">
              Gerenciar Locais
            </a>
          </h4>
        </div>
        <div id="gerenciarLocais" class="panel-collapse collapse">
          <div class="panel-body">
            <li><a href="{{URL::route('admin.states.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Estados </a></li>
            <li><a href="{{URL::route('admin.cities.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Cidades</a></li>
            <li><a href="{{URL::route('admin.places.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Locais</a></li>
            <li><a href="{{URL::route('admin.countries.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Países</a></li>
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
            <li><a href="{{URL::route('password.edit')}}"> <i class="fa fa-pencil-square-o"></i> Mudar minha senha </a></li>
            <li><a href="{{URL::route('logout')}}"><i class="fa fa-sign-out"></i> Sair </a></li>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#gerenciarTudo" href="#gerenciarLocais">
              Checklist
            </a>
          </h4>
        </div>
        <div id="gerenciarLocais" class="panel-collapse collapse">
          <div class="panel-body">
            <li><a href="{{URL::route('checklists.create')}}"><i class="fa fa-pencil-square-o"></i> Montar Checklist </a></li>
            <li><a href="{{URL::route('checklists.pesquisar')}}"><i class="fa fa-pencil-square-o"></i> Responder Checklist </a></li>
          </div>
        </div>
      </div>
    </div>

  @else
    <p> Você ainda não fez seu login.</p>
    <ul>
      <li><a href="{{URL::route('users.login')}}"><i class="fa fa-sign-in"></i> Faça seu Login </a> ou <a href="/fb"><i class="fa fa-facebook-square"></i> Login Via Facebook </a>
    </ul>
  @endif

  <div class="container panel-main">
    <h2>Ultimas avaliações</h2>
  <ul class="list-unstyled">
    <?php 
      $evaluations = Evaluation::take(30)->limit(7)->get();

      foreach ($evaluations as $e) {
    ?>

      <li><a href='http://localhost:8000/evaluations/visualizarresposta/{{ $e->id }}'><?= Place::find($e->place_id)->name." no ".Checklist::find($e->checklist_id)->name ?></a></li> 
    
    <?php    
      }
    ?>
<ul>
  </div>
</div>
@stop