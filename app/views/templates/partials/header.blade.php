<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> <i class="fa fa-home"> Listonly</i></a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a id="font-up" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Aumentar zoom da tela") }}" title="{{ Lang::get("Aumentar zoom da tela") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/font_up.png">
                    </a>
                </li>
                <li>
                    <a id="font-down" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Diminuir zoom da tela") }}" title="{{ Lang::get("Diminuir zoom da tela") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/font_down.png">
                    </a>
                </li>
                <li>
                    <a id="font" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Resetar zoom da tela") }}" title="{{ Lang::get("Resetar zoom da tela") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/font.png">
                    </a>
                </li>
                <li>
                    <a id="high-contrast" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Alternar para muito ou baixo constraste") }}" title="{{ Lang::get("Alternar para muito ou baixo constraste") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/high_contrast.png">
                    </a>
                </li>
            </ul>

            {{ Form::open(['route' => 'search', 'class' => 'navbar-form navbar-left', 'method' => 'GET']) }}
                <div class="form-group">
                    <input type="text" class="form-control" name="keywords" placeholder="{{ Lang::get("Pesquisa") }}" title="{{ Lang::get("Pesquisa") }}">
                </div>
                <button type="submit" class="btn btn-primary" role="submit" alt="{{ Lang::get("Pesquisar") }}" title="{{ Lang::get("Pesquisar") }}">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            {{ Form::close() }}

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::user())
                    <li>
                        <a href="{{ URL::route("users.profile") }}" alt="{{ Lang::get("Perfil") }}" title="{{ Lang::get("Perfil") }}">
                            {{ Auth::user()->username }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::route("logout") }}" alt="{{ Lang::get("Deslogar") }}" title="{{ Lang::get("Deslogar") }}">
                            <span class="glyphicon glyphicon-off"></span>
                        </a>
                    </li> {{-- terminar isso --}}
                @else
                    <li>
                        <a href="{{ URL::route('users.login') }}" alt="{{ Lang::get("Logar") }}" title="{{ Lang::get("Logar") }}" role="link">
                            {{ Lang::get("Logar") }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</nav>