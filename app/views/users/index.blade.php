@extends('templates.index')

@section('title'){{ Str::title(Lang::get('usuários')) }} @stop

@section('novo')
<a href="{{ URL::to('users/create') }}" class="btn btn-sm btn-primary">{{ Lang::get('novo usuário') }}</a>
@stop

@section('table-data')

    <tr>
        <th class="text-center">{{ Lang::get('ID') }}</th>
        <th class="text-center">{{ Lang::get('Username') }}</th>
        <th class="text-center">{{ Lang::get('E-Mail') }}</th>
        <th class="text-center">{{ Lang::get('Especialidade') }}</th>
        <th class="text-center">{{ Lang::get('É administrador?') }}</th>
        <th class="text-center">{{ Lang::get('Sexo') }}</th>
        <th class="text-center">{{ Lang::get('Biografia') }}</th>
        <th class="text-center">{{ Lang::get('Url do Retrato') }}</th>
        <th class="text-center">{{ Lang::get('Ações') }}</th>
    </tr>

    @foreach ($users as $user)
    <tr id="line{{$user->id }}">
        <td class="text-center">{{ $user->id }}</td>
        <td>{{ Str::limit($user->username, 48) }}</td>
        <td>{{ Str::limit($user->email, 48) }}</td>
        <td>{{ Str::limit($user->speciality, 48) }}</td>
        <td class="text-center">{{ $user->is_admin? 'sim' : 'não' }}</td>
        <td class="text-center">{{ $user->gender }}</td>
        <td>{{ Str::limit($user->biography, 64) }}</td>
        <td>{{ Str::limit($user->picture_url, 48) }}</td>
        <td>
            <div class="btn-group text-center">
                <a href="{{ URL::route('users.show', $user->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span>{{ Lang::get('Exibir') }}</a>
                <a href="{{ URL::route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('users.destroy', $user->id) }}"
                   data-id="{{ $user->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span>{{ Lang::get('Deletar') }}</a>
            </div>
        </td>
    </tr>
@endforeach

@stop