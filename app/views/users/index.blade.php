@extends('templates.default')

@section('title'){{ Str::title(Lang::get('usuários')) }} @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('users/create') }}">{{ Lang::get('novo usuário') }}</a>

    <table>

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
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->speciality }}</td>
            <td>{{ $user->is_admin? 'sim' : 'não' }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ Str::limit($user->biography, 64) }}</td>
            <td>{{ Str::limit($user->picture_url, 64) }}</td>
            <td>
                <a href="{{ URL::route('users.show', $user->id) }}">{{ Lang::get('mostrar usuário') }}</a>
                <a href="{{ URL::route('users.edit', $user->id) }}">{{ Lang::get('editar usuário') }}</a>
                <a href="{{ URL::route('users.destroy', $user->id) }}" data-method="delete"
                   rel="nofollow" data-confirm="{{ Lang::get('Tem certeza que deseja deletar?') }}">{{ Lang::get('deletar usuário') }}
                </a>
            </td>
        </tr>
        @endforeach

    </table>

@stop