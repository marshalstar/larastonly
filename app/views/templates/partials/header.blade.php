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
                @if(Auth::user())
                    <li><a href="{{URL::route('editUser', Auth::user()->id)}}">{{ Auth::user()->username }}</a></li>
                @else
                    <li><a href="{{URL::route('users.login')}}">Login</a></li>
                    <li><a href="{{URL::route('users.new')}}">Crie sua conta</a></li>
                @endif
                <li><a href="{{URL::route('checklists.create')}}"><span class="glyphicon glyphicon-plus"></span>{{ Lang::get(' checklist') }}</a></li>
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