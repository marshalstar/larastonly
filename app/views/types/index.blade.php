@extends('templates.index')

@section('title'){{ Str::title(Lang::get('tipos')) }} @stop

@section('novo')
<a href="{{ URL::to('types/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('Novo Tipo') }}</a>
@stop

@section('table-data')

    <tr>
        <th class="text-center">{{ Lang::get('Id') }}</th>
        <th class="text-center">{{ Lang::get('Nome') }}</th>      
        <th class="text-center">{{ Lang::get('Ações') }}</th>
        
    </tr>

    @foreach ($types as $type)
        <tr id="line{{ $type->id }}">
            <td class="text-center">{{ $type->id }}</td>
            <td>{{ Str::limit($type->name, 37) }}</td>
                <td class="text-cent">
                <div class="list-inline">
                    <a href="{{ URL::route('types.show', $type->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('types.edit', $type->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('types.destroy', $type->id) }}"
                       data-id="{{ $type->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach

@stop