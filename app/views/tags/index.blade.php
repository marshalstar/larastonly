@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tags')) }} @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('tags/create') }}">{{ Lang::get('nova tag') }}</a>

    <table>

        <tr>
            <th>{{ Lang::get('id') }}</th>
            <th>{{ Lang::get('nome') }}</th>
            <th>{{ Lang::get('ações') }}</th>
        </tr>

        @foreach ($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>
                <a href="{{ URL::route('tags.show', $tag->id) }}">{{ Lang::get('mostrar tag') }}</a>
                <a href="{{ URL::route('tags.edit', $tag->id) }}">{{ Lang::get('editar tag') }}</a>
                <a href="{{ URL::route('tags.destroy', $tag->id) }}" data-method="delete"
                   rel="nofollow" data-confirm="{{ Lang::get('Tem certeza que deseja deletar?') }}">{{ Lang::get('deletar tag') }}
                </a>
            </td>
        </tr>
        @endforeach

    </table>

@stop