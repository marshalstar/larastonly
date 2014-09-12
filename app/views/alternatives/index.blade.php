@extends('templates.default')

@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('content')

    <div class="container theme-showcase">

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <a href="{{ URL::to('alternatives/create') }}" class="btn btn-sm btn-primary">{{ Lang::get('nova alternativa') }}</a>
        <br/> <!-- Não use <br/>! Eu peguei lá do código fonte do bootstrap. Por favor, ache uma alternativa -->
        <!-- Não use <br/>! Eu peguei lá do código fonte do bootstrap. Por favor, ache uma alternativa -->

        <div>
            <table class="table table-hover">

                <tr>
                    <th>{{ Lang::get('Id') }}</th>
                    <th>{{ Lang::get('Name') }}</th>
                    <th>{{ Lang::get('Type_id') }}</th>
                    <th>{{ Lang::get('Ações') }}</th>
                </tr>

                @foreach ($alternatives as $alternative)
                <tr>
                    <td>{{ $alternative->id }}</td>
                    <td>{{ $alternative->name }}</td>
                    <td>{{ $alternative->type_id }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ URL::route('alternatives.show', $alternative->id) }}" class="btn btn-sm btn-info">{{ Lang::get('Exibir') }}</a>
                            <a href="{{ URL::route('alternatives.edit', $alternative->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('Editar') }}</a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">{{ Lang::get('Deletar') }}</a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>

    <!-- Isto deve ficar em um template separado -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Deletar</h4>
                </div>
                <div class="modal-body">
                    {{ Lang::get('Tem certeza que deseja deletar?') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="{{ URL::route('alternatives.destroy', $alternative->id) }}" data-method="delete" rel="nofollow"
                       class="btn btn-sm btn-danger" data-dismiss="modal">
                        {{ Lang::get('deletar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop
