@extends('templates.index')

@section('title'){{ Str::title(Str::title(Lang::get('avaliações'))) }} @stop

@section('novo')
<a href="{{ URL::to('evaluations/create') }}" class= "btn btn-sm btn-primary">{{ Str::title(Lang::get('nova avaliação')) }}</a>
@stop

@section('table-data')

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
<tr id="line{{ $evaluation->id }}">
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
            <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('evaluations.destroy', $evaluation->id) }}"
               data-id="{{ $evaluation->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in">{{ Lang::get('Deletar') }}</a>
        </div>
    </td>
</tr>
@endforeach

@stop