@extends('templates.default')

@section('title'){{ Str::title(Str::title(Lang::get('avaliações'))) }} @stop

@section('content')

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('evaluations/create') }}">{{ Lang::get('nova avaliação') }}</a>

    <table>

        <tr>
            <th>{{ Lang::get('id') }}</th>
            <th>{{ Lang::get('comentário') }}</th>
            <th>{{ Lang::get('user_id') }}</th>
            <th>{{ Lang::get('checklist_id') }}</th>
            <th>{{ Lang::get('criado em') }}</th>
            <th>{{ Lang::get('editado a') }}</th>
            <th>{{ Lang::get('ações') }}</th>
        </tr>

        @foreach ($evaluations as $evaluation)
        <tr>
            <td>{{ $evaluation->id }}</td>
            <td>{{ Str::limit($evaluation->commentary, 64) }}</td>
            <td>{{ $evaluation->user_id }}</td>
            <td>{{ $evaluation->checklist_id }}</td>
            <td>{{ $evaluation->created_at->format('d/m/Y') }}</td>
            <td>{{ $evaluation->updated_at->diffForHumans() }}</td>
            <td>
                <a href="{{ URL::route('evaluations.show', $evaluation->id) }}">{{ Lang::get('mostrar avaliação') }}</a>
                <a href="{{ URL::route('evaluations.edit', $evaluation->id) }}">{{ Lang::get('editar avaliação') }}</a>
                <a href="{{ URL::route('evaluations.destroy', $evaluation->id) }}" data-method="delete"
                   rel="nofollow" data-confirm="{{ Lang::get('Tem certeza que deseja deletar?') }}">{{ Lang::get('deletar avaliação') }}
                </a>
            </td>
        </tr>
        @endforeach

    </table>

@stop