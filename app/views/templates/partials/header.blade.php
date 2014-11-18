<nav class="navbar navbar-fixed-top" role="navigation">
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
                    <a id="font-up" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Aumentar o tamanho da fonte") }}" title="{{ Lang::get("Aumentar o tamanho da fonte") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/font_up.png">
                    </a>
                </li>
                <li>
                    <a id="font-down" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Diminuir o tamanho da fonte") }}" title="{{ Lang::get("Diminuir o tamanho da fonte") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/font_down.png">
                    </a>
                </li>
                <li>
                    <a id="font" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Resetar o tamanho da fonte") }}" title="{{ Lang::get("Resetar o tamanho da fonte") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/font.png">
                    </a>
                </li>
                <li>
                    <a id="high-contrast" class="navbar-brand" href="javascript:void(0);" alt="{{ Lang::get("Alternar para muito ou baixo constraste") }}" title="{{ Lang::get("Alternar para muito ou baixo constraste") }}">
                        <img style="width: 30px; height: 30px; max-width:100px; margin-top: -7px;" alt="Brand" src="/img/high_contrast.png">
                    </a>
                </li>
                <li>
                    {{ Form::open(['route' => 'search', 'class' => 'navbar-form navbar-left', 'method' => 'GET']) }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="keywords" placeholder="{{ Lang::get("Pesquisa") }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="{{ Lang::get("Pesquisar") }}">
                    {{ Form::close() }}
                </li>
            </ul>
        </div>

    </div>
</nav>