@extends('templates.index')

@section('title'){{ Str::title(Lang::get('checklists')) }} @stop

@section('novo')
<a href="{{ URL::to('checklists/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('Novo Checklist') }}</a>
@stop

@section('table-data')

    <tr>
        <th class="text-center">{{ Lang::get('Id') }}</th>
        <th class="text-center">{{ Lang::get('Name') }}</th>
        <th class="text-center">{{ Lang::get('Title_id') }}</th>
        <th class="text-center">{{ Lang::get('User_id') }}</th>
        <th class="text-center">{{ Lang::get('Ações') }}</th>
    </tr>

    @foreach ($checklists as $checklist)
        <tr id="line{{ $checklist->id }}">
            <td class="text-center">{{ $checklist->id }}</td>
            <td>{{ Str::limit($checklist->name, 37) }}</td>
            <td class="text-center">{{ $checklist->title_id }}</td>
            <td class="text-center">{{$checklist->user_id}}</td>
            <td class="text-center">
                <div class="list-inline">
                    <a href="{{ URL::route('checklists.show', $checklist->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('checklists.edit', $checklist->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('checklists.destroy', $checklist->id) }}"
                       data-id="{{ $checklist->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach

@stop

