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
                    zxc
                @endif
                {{-- Form::open(array('route' => 'search', 'class' => 'navbar-form navbar-left')) }}
                    <div class="form-group">

                    {{Form::text('keyword', 'Pesquisar', array('id' => 'keyword'))}}
                    <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                {{Form::close()--}}
            </ul>
        </div>
        <!--/.nav-collapse-->
    </div>
</div>