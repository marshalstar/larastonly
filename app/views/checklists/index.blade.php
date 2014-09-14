@extends('templates.index')

@section('title'){{ Str::title(Lang::get('checklists')) }} @stop

@section('novo')
<a href="{{ URL::to('checklists/create') }}" class="btn btn-sm btn-primary">{{ Lang::get('Novo Checklist') }}</a>
@stop

@section('table-data')

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
<tr id="line{{ $checklist->id }}">
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
            <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('checklists.destroy', $checklist->id) }}"
               data-id="{{ $checklist->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in">{{ Lang::get('Deletar') }}</a>
        </div>
    </td>
</tr>
@endforeach

@stop

