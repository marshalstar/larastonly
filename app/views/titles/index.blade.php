@extends('templates.default')

@section('title'){{ Str::title(Lang::get('títulos')) }} @stop

@section('content')

    <div class = "container theme-showcase">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <a href="{{ URL::to('titles/create') }}" class="btn btn-sm btn-info">{{ Lang::get('novo título') }}</a>

        <table class="table table-hover">

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
                    <div class = "btn-group">
                        <a href="{{ URL::route('titles.show', $title->id) }}" class="btn btn-sm btn-info">{{ Lang::get('mostrar título') }}</a>
                        <a href="{{ URL::route('titles.edit', $title->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('editar título') }}</a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">{{ Lang::get('Deletar') }}</a>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>
    </div>


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
                    <a href="{{ URL::route('titles.destroy', $title->id) }}" data-method="delete" rel="nofollow"
                       class="btn btn-sm btn-danger" data-dismiss="modal">
                        {{ Lang::get('Deletar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop
