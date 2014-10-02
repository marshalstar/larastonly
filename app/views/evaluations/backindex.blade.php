@extends('templates.index')

@section('title'){{ Str::title(Str::title(Lang::get('avaliações'))) }} @stop

@section('novo')
<a href="{{ URL::to('evaluations/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('Nova Avaliação') }}</a>
@stop

@section('table-data')

    <tr>
        <th class="text-center">{{ Lang::get('Id') }}</th>
        <th class="text-center">{{ Lang::get('Descrição') }}</th>
        <th class="text-center">{{ Lang::get('User_id') }}</th>
        <th class="text-center">{{Lang::get('Checklist_id')}}</th>
        <th class="text-center">{{ Lang::get('Ações') }}</th>
    </tr>

    @foreach ($evaluations as $evaluation)
        <tr id="line{{ $evaluation->id }}">
            <td class="text-center">{{ $evaluation->id }}</td>
            <td>{{ Str::limit($evaluation->commentary, 37) }}</td>
            <td class="text-center">{{ $evaluation->user_id }}</td>
            <td class="text-center">{{$evaluation->checklist_id}}</td>
            <td class="text-center">
                <div class="list-inline">
                    <a href="{{ URL::route('evaluations.show', $evaluation->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('evaluations.edit', $evaluation->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('evaluations.destroy', $evaluation->id) }}"
                       data-id="{{ $evaluation->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach

@stop