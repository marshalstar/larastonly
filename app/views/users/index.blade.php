@extends('templates.default')

@section('title'){{ Str::title(Lang::get('usuários')) }} @stop

@section('content')

    <div class="container theme-showcase">

        @if (Session::has('message'))
            <div class="alert alert-info" class="btn btn-sm btn-primary">{{ Session::get('message') }}</div>
        @endif

        <a href="{{ URL::to('users/create') }}" class="btn btn-sm btn-primary">{{ Lang::get('novo usuário') }}</a>

        <table class="table table-hover">

            <tr>
                <th>{{ Lang::get('id') }}</th>
                <th>{{ Lang::get('nome do usuário') }}</th>
                <th>{{ Lang::get('email') }}</th>
                <th>{{ Lang::get('especialidade') }}</th>
                <th>{{ Lang::get('é administrador?') }}</th>
                <th>{{ Lang::get('sexo') }}</th>
                <th>{{ Lang::get('biografia') }}</th>
                <th>{{ Lang::get('url do retrato') }}</th>
                <th>{{ Lang::get('ações') }}</th>
            </tr>

            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ Str::limit($user->username, 48) }}</td>
                <td>{{ Str::limit($user->email, 48) }}</td>
                <td>{{ Str::limit($user->speciality, 48) }}</td>
                <td>{{ $user->is_admin? 'sim' : 'não' }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ Str::limit($user->biography, 64) }}</td>
                <td>{{ Str::limit($user->picture_url, 48) }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ URL::route('users.show', $user->id) }}" class="btn btn-sm btn-info">{{ Lang::get('mostrar usuário') }}</a>
                        <a href="{{ URL::route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('editar usuário') }}</a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">{{ Lang::get('Deletar') }}</a>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

    <!-- Isto deve ficar em um template separado -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Deletar</h4>
                </div>
                <div class="modal-body">
                    {{ Lang::get('Tem certeza que deseja deletar?') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ URL::route('users.destroy', $user->id) }}" data-method="delete" rel="nofollow"
                       class="btn btn-sm btn-danger" data-dismiss="modal">
                        {{ Lang::get('deletar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop