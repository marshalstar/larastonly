@extends('templates.default')

@section('content')

<p id="breadCrumb">
        Você está em:
        <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
    </p>

<div class="container container-main">

    @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Listonly</h1>

    <div class="panel">

        @if(Auth::check() && Auth::user()->is_admin)
            <p> Bem-vindo(a), {{Auth::user()->username}}</p>
            <div class="list-group-item">
                <a href="#" class="list-group-item active">Gerenciar Checklist</a>

                <ul>
                    <li><a href="{{URL::route('admin.checklists.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Checklist </a></li>
                    <li><a href="{{URL::route('admin.alternatives.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Alternativas</a></li>
                    <li><a href="{{URL::route('admin.questions.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Questões</a></li>
                    <li><a href="{{URL::route('admin.evaluations.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Avaliações</a></li>
                    <li><a href="{{URL::route('admin.typePlaces.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tipos de Lugar </a></li>
                    <li><a href="{{URL::route('admin.titles.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Títulos </a></li>

                      <!-- <li><a href="{{URL::route('admin.typeQuestions.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Tipo </a></li> -->

                    <li><a href="{{URL::route('checklists.create')}}"><i class="fa fa-pencil-square-o"></i> Criar Checklist </a></li>
                </ul>
            </div>
            <p></p>

            <div class="list-group-item">
                <a href="#" class="list-group-item active">Gerenciar Perfis</a>
                    <ul>
                        <li><a href="{{URL::route('admin.users.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Perfis </a></li>
                        <li><a href="{{URL::route('password.edit')}}"> <i class="fa fa-pencil-square-o"></i> Mudar minha senha </a></li>
                        <li><a href="{{URL::route('logout')}}"><i class="fa fa-sign-out"></i> Sair </a></li>
                    </ul>
            </div>
            <p></p>

            <div class="list-group-item">
                <a href="#" class="list-group-item active">Gerenciar Locais</a>
                    <ul>
                        <li><a href="{{URL::route('admin.states.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Estados </a></li>
                        <li><a href="{{URL::route('admin.cities.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Cidades</a></li>
                        <li><a href="{{URL::route('admin.places.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Locais</a></li>
                        <li><a href="{{URL::route('admin.countries.index')}}"><i class="fa fa-pencil-square-o"></i> Gerenciar Países</a></li>
                    </ul>
            </div>
            <p></p>

        @elseif(Auth::check())
            <p> Bem-vindo(a), {{Auth::user()->username}}</p>
            <div class="list-group-item">
                <a href="#" class="list-group-item active">Checklist</a>
                    <ul>
                        <li><a href="{{URL::route('checklists.create')}}"><i class="fa fa-pencil-square-o"></i> Criar  Checklist </a></li>
                    </ul>
            </div>
            <p></p>

            <div class="list-group-item">
                <a href="#" class="list-group-item active">Gerenciar Perfis</a>
                    <ul>
                        <li><a href="{{URL::route('editUser',Auth::user()->id)}}"><i class="fa fa-pencil-square-o"></i> Editar Perfil</a></li>
                        <li><a href="{{URL::route('password.edit')}}"> <i class="fa fa-pencil-square-o"></i> Mudar minha senha </a></li>
                        <li><a href="{{URL::route('logout')}}"><i class="fa fa-sign-out"></i> Sair </a></li>
                    </ul>
            </div>
            <p></p>

        @else
            <p> Você ainda não fez seu login.</p>
            <ul>
                <li><a href="{{URL::route('users.login')}}"><i class="fa fa-sign-in">s</i> Faça seu Login </a> ou <a href="/fb"><i class="fa fa-facebook-square"></i> Login Via Facebook </a>
                <li><a href="{{URL::route('users.new')}}"><i class="fa fa-plus-square-o"></i> Ainda não está cadastrado? Crie sua conta!</a>
            </ul>
        @endif

        <div class="container panel-main">
            <h2>Ultimas avaliações</h2>
            <ul class="list-unstyled">
                <?php $evaluations = Evaluation::take(30)->limit(7)->get(); ?>

                @foreach($evaluations as $e)
                    <li><a href='evaluations/visualizarresposta/{{ $e->id }}'><?= Place::find($e->place_id)->name." no ".Checklist::find($e->checklist_id)->name ?></a></li>
                @endforeach

            </ul>
        </div>

        @if (!Auth::guest())
            <div class="container panel-main">
                <h2>Seus checklists</h2>

                <?php $checklists = Auth::user()->checklists; ?>
                <table class="table table-hover">
                    <tbody>
                        @foreach($checklists as $c)
                        <tr>
                            <td>{{ $c->name }}</td>
                            <td>
                                <a href="checklists/edit/{{ $c->id }}">
                                    <span class="glyphicon glyphicon-wrench" title="editar" alt="editar checklist"></span>
                                </a>
                                <a href="javascript:void(0);" class="del-checklist" data-id="{{ $c->id }}">
                                    <span class="glyphicon glyphicon-remove" title="excluir" alt="excluir checklist"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<a class="popup-with-zoom-anim error-modal" href="#error-dialog" style="display:none"></a>
@stop

@section('script')
    @include('templates.modal.error.effect')
    <script>@include('templates.modal.error.script')</script>
    <script>

        $(function() {
            $(document).on('click', '.del-checklist', function() {
                var btn = $(this);
                $.ajax({
                    'url': 'checklists/destroy/ajax/' + $(this).attr('data-id'),
                    success: function(e) {
                        btn.closest("tr").remove();
                    },
                    error: function(e) {
                        console.error(e);
                        $(".error-modal").click();
                        $('.msg').text("Verifique sua conexão com a internet.");
                    }
                });
            });
        });
    </script>
@stop