@extends('templates.default')

@section('title'){{ Str::title(Lang::get('checklists')) }} @stop

@section('content')

    <div class="container theme-showcase">

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <a href="{{ URL::to('checklists/create') }}" class="btn btn-sm btn-primary">{{ Lang::get('Novo Checklist') }}</a>
        <br/> <!-- Não use <br/>! Eu peguei lá do código fonte do bootstrap. Por favor, ache uma alternativa -->
        <!-- Não use <br/>! Eu peguei lá do código fonte do bootstrap. Por favor, ache uma alternativa -->

        <div>
            <table class="table table-hover">

                <tr>
                    <th>{{ Lang::get('id') }}</th>
                    <th>{{ Lang::get('nome') }}</th>
                    <th>{{ Lang::get('user_id') }}</th>
                    <th>{{ Lang::get('title_id') }}</th>
                    <th>{{ Lang::get('criado em') }}</th>
                    <th>{{ Lang::get('atualizado a') }}</th>
                    <th>{{ Lang::get('ações') }}</th>
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
                        <div class="btn-group">
                            <a href="{{ URL::route('checklists.show', $checklist->id) }}" class="btn btn-sm btn-info">{{ Lang::get('Mostrar') }}</a>
                            <a href="{{ URL::route('checklists.edit', $checklist->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('Editar') }}</a>
                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">{{ Lang::get('deletar') }}</a>
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
                    <a href="{{ URL::route('checklists.destroy', $checklist->id) }}" data-method="delete" rel="nofollow"
                       class="btn btn-sm btn-danger" data-dismiss="modal">
                        {{ Lang::get('deletar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop

