@extends('templates.default')

@section('title')Alternativas @stop

@section('content')

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('alternatives/create') }}">Nova alternative</a>

    <table>

        <tr>
            <th>id</th>
            <th>name</th>
            <th>type_id</th>
            <th>ações</th>
        </tr>

        @foreach ($alternatives as $alternative)
        <tr>
            <td>{{ $alternative->id }}</td>
            <td>{{ $alternative->name }}</td>
            <td>{{ $alternative->type_id }}</td>
            <td>
                <a href="{{ URL::route('alternatives.show', $alternative->id) }}">Mostrar alternative</a>
                <a href="{{ URL::route('alternatives.edit', $alternative->id) }}">Editar alternative</a>
                {{ Form::open(array('url' => 'alternatives/' . $alternative->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Deletar alternative', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

    </table>

@stop