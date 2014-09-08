@extends('templates.default')

@section('title'){{ Lang::get('Alternativas') }} @stop

@section('content')

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('alternatives/create') }}">{{ Lang::get('Nova alternativa') }}</a>

    <table>

        <tr>
            <th>{{ Lang::get('id') }}</th>
            <th>{{ Lang::get('name') }}</th>
            <th>{{ Lang::get('type_id') }}</th>
            <th>{{ Lang::get('ações') }}</th>
        </tr>

        @foreach ($alternatives as $alternative)
        <tr>
            <td>{{ $alternative->id }}</td>
            <td>{{ $alternative->name }}</td>
            <td>{{ $alternative->type_id }}</td>
            <td>
                <a href="{{ URL::route('alternatives.show', $alternative->id) }}">{{ Lang::get('Mostrar alternativa') }}</a>
                <a href="{{ URL::route('alternatives.edit', $alternative->id) }}">{{ Lang::get('Editar alternativa') }}</a>
                <a href="{{ URL::route('alternatives.destroy', $alternative->id) }}">{{ Lang::get('Destruir alternativa') }}</a>
                {{ Form::open(array('url' => 'alternatives/' . $alternative->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit(Lang::get('Deletar Alternativa'), array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

    </table>

@stop