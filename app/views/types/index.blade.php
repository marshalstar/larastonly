@extends('templates.default')

@section('title'){{ Str::title(Lang::get('tipos')) }} @stop

@section('content')

    <div class="container theme-showcase">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <a href="{{ URL::to('types/create') }}" class="btn btn-sm btn-primary">{{ Lang::get('novo tipo') }}</a>

        <table class="table table-hover">

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
                    <div class="btn-group">
                        <a href="{{ URL::route('types.show', $type->id) }}" class="btn btn-sm btn-info">{{ Lang::get('mostrar tipo') }}</a>
                        <a href="{{ URL::route('types.edit', $type->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('editar tipo') }}</a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">{{ Lang::get('Deletar') }}</a>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>

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
                    <a href="{{ URL::route('types.destroy', $type->id) }}" data-method="delete" rel="nofollow"
                       class="btn btn-sm btn-danger" data-dismiss="modal">
                        {{ Lang::get('deletar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop