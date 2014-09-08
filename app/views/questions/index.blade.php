@extends('templates.default')

@section('title'){{ Lang::get('questões') }} @stop

@section('content')

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('questions/create') }}">{{ Lang::get('nova questão') }}</a>

    <table>

        <tr>
            <th>{{ Lang::get('id') }}</th>
            <th>{{ Lang::get('enunciado') }}</th>
            <th>{{ Lang::get('type_id') }}</th>
            <th>{{ Lang::get('é sobre avaliado') }}?</th>
            <th>{{ Lang::get('peso') }}</th>
            <th>{{ Lang::get('ações') }}</th>
        </tr>

        @foreach ($questions as $question)
        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ Str::limit($question->statement, 64) }}</td>
            <td>{{ $question->title_id }}</td>
            <td>{{ $question->is_about_assessable? Lang::get('sim') : Lang::get('não') }}</td>
            <td>{{ $question->weight }}</td>
            <td>
                <a href="{{ URL::route('questions.show', $question->id) }}">{{ Lang::get('mostrar questão') }}</a>
                <a href="{{ URL::route('questions.edit', $question->id) }}">{{ Lang::get('editar questão') }}</a>
                <a href="{{ URL::route('questions.destroy', $question->id) }}" data-method="delete"
                   rel="nofollow" data-confirm="{{ Lang::get('Tem certeza que deseja deletar?') }}">{{ Lang::get('deletar questão') }}
                </a>
            </td>
        </tr>
        @endforeach

    </table>

@stop