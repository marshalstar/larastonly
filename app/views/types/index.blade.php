@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tipos')) }} @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('types/create') }}">{{ Lang::get('novo tipo') }}</a>

    <table>

        <tr>
            <th>{{ Lang::get('id') }}</th>
            <th>{{ Lang::get('nome') }}</th>
            <th>{{ Lang::get('ações') }}</th>
        </tr>

        @foreach ($types as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>
                <a href="{{ URL::route('types.show', $type->id) }}">{{ Lang::get('mostrar tipo') }}</a>
                <a href="{{ URL::route('types.edit', $type->id) }}">{{ Lang::get('editar tipo') }}</a>
                <a href="{{ URL::route('types.destroy', $type->id) }}" data-method="delete"
                   rel="nofollow" data-confirm="{{ Lang::get('Tem certeza que deseja deletar?') }}">{{ Lang::get('deletar tipo') }}
                </a>
            </td>
        </tr>
        @endforeach

    </table>

@stop