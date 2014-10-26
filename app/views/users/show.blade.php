@extends('templates.default')

@section('title'){{ Str::title(Lang::get('user')). ' ' .$user->name }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
                <a href="{{URL::route('admin.users.index')}}" title= "Volta a página de gerenciar perfis."> Gerenciar Perfis </a>
            / Visualizar perfil.
            
          </p>
    <div class="container" style="display: block; background-color: white; padding: 10px;">

        <table class="table">
            <tbody>

                <tr>
                    <td><h3>{{ Str::title(Lang::get('usuário')) }}</h3></td>
                    <td><h3><small>{{ $user->username }}</small></h3></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('id')) }}</h4></td>
                    <td><h4><small>{{ $user->id }}</small></h4></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('nome usuário')) }}</h4></td>
                    <td><h4><small>{{ $user->username }}</small></h4></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('email')) }}</h4></td>
                    <td><h4><small>{{ $user->email }}</small></h4></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('especialidade')) }}</h4></td>
                    <td><h4><small>{{ $user->especialidade }}</small></h4></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('é administrador')) }}?</h4></td>
                    <td><h4><small>{{ $user->is_admin? Lang::get('sim') : Lang::get('não') }}</small></h4></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('sexo')) }}</h4></td>
                    <td><h4><small>{{ $user->gender }}</small></h4></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('biografia')) }}</h4></td>
                    <td><h4><small>{{ $user->biography }}</small></h4></td>
                </tr>

                <tr>
                    <td><h4>{{ Str::title(Lang::get('url imagem')) }}</h4></td>
                    <td><h4><small>{{ $user->picture_url }}</small></h4></td>
                </tr>

            </tbody>
        </table>

    </div>

@stop