@extends('templates.default')

@section('title'){{ Lang::get('Checklists') }} @stop

@section('content')

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('checklists/create') }}">{{ Lang::get('novo checklist') }}</a>

    <table>

        <tr>
            <th>{{ Lang::get('id') }}</th>
            <th>{{ Lang::get('nome') }}</th>
            <th>{{ Lang::get('user_id') }}</th>
            <th>{{ Lang::get('title_id') }}</th>
            <th>{{ Lang::get('criado em') }}</th>
            <th>{{ Lang::get('atualizado a') }}</th>
            <th>ações</th>
        </tr>

        @foreach ($checklists as $checklist)
        <tr>
            <td>{{ $checklist->id }}</td>
            <td>{{ $checklist->name }}</td>
            <td>{{ $checklist->user_id }}</td>
            <td>{{ $checklist->title_id }}</td>
            <td>{{ $checklist->created_at->format('d/m/Y') }}</td>
            <td>{{ $checklist->updated_at->diffForHumans() }}</td>
            <td>
                <a href="{{ URL::route('checklists.show', $checklist->id) }}">{{ Lang::get('mostrar checklist') }}</a>
                <a href="{{ URL::route('checklists.edit', $checklist->id) }}">{{ Lang::get('editar checklist') }}</a>
                <a href="{{ URL::route('checklists.destroy', $checklist->id) }}" data-method="delete"
                   rel="nofollow" data-confirm="{{ Lang::get('Tem certeza que deseja deletar?') }}">{{ Lang::get('deletar checklist') }}
                </a>
            </td>
        </tr>
        @endforeach

    </table>

@stop
