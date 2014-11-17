<div class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> <i class="fa fa-home"> Listonly</i></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                {{ Form::open(['route' => 'search', 'class' => 'navbar-form navbar-left', 'method' => 'GET']) }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="keywords" placeholder="{{ Lang::get("Pesquisa") }}">
                    </div>
                    <input type="submit" class="btn btn-default" value="{{ Lang::get("Pesquisar") }}">
                {{ Form::close() }}
            </ul>
        </div>
        <!--/.nav-collapse-->
    </div>
</div>