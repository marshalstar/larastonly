@extends('templates.default')

@section('title'){{ Str::title(Str::title(Lang::get('Avaliações'))) }} @stop

@section('content')
    <div class="container theme-showcase">
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a href="{{ URL::to('evaluations/create') }}" class= "btn btn-sm btn-primary">{{ Lang::get('Nova Avaliação') }}</a>

        
    <table class = "table table-hoover">

        <tr>
            <th>{{ Lang::get('ID') }}</th>
            <th>{{ Lang::get('Comentário') }}</th>
            <th>{{ Lang::get('User_id') }}</th>
            <th>{{ Lang::get('Checklist_id') }}</th>
            <th>{{ Lang::get('Criado em') }}</th>
            <th>{{ Lang::get('Editado a') }}</th>
            <th>{{ Lang::get('Ações') }}</th>
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
                <div class = "btn-group">
                <a href="{{ URL::route('evaluations.show', $evaluation->id) }}" class = "btn btn-sm btn-info">{{ Lang::get('Exibir') }}</a>
                <a href="{{ URL::route('evaluations.edit', $evaluation->id) }}" class = "btn btn-sm btn-warning">{{ Lang::get('Editar') }}</a>
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
                    <a href="{{ URL::route('evaluations.destroy', $evaluation->id) }}" data-method="delete" rel="nofollow"
                       class="btn btn-sm btn-danger" data-dismiss="modal">
                        {{ Lang::get('Deletar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop