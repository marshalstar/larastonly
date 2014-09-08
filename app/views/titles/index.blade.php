@extends('templates.default')

@section('title'){{ Str::title(Lang::get('títulos')) }} @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('titles/create') }}">{{ Lang::get('novo título') }}</a>

    <table>

        <tr>
            <th>{{ Lang::get('id') }}</th>
            <th>{{ Lang::get('nome') }}</th>
            <th>{{ Lang::get('título pai') }}</th>
            <th>{{ Lang::get('ações') }}</th>
        </tr>

        @foreach ($titles as $title)
        <tr>
            <td>{{ $title->id }}</td>
            <td>{{ $title->name }}</td>
            <td>{{ ($pai = $title->title_id)? $pai : Lang::get('sem pai') }}</td>
            <td>
                <a href="{{ URL::route('titles.show', $title->id) }}">{{ Lang::get('mostrar título') }}</a>
                <a href="{{ URL::route('titles.edit', $title->id) }}">{{ Lang::get('editar título') }}</a>
                <a href="{{ URL::route('titles.destroy', $title->id) }}" data-method="delete"
                   rel="nofollow" data-confirm="{{ Lang::get('Tem certeza que deseja deletar?') }}">{{ Lang::get('deletar título') }}
                </a>
            </td>
        </tr>
        @endforeach

    </table>

@stop