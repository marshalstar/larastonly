@extends('templates.index')

@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('novo')
<a href="{{ URL::to('alternatives/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('nova alternativa') }}</a>
@stop

@section('table-data')

    <thead>
    <tr>
        <th class="text-center">{{ Lang::get('Id') }}</th>
        <th class="text-center">{{ Lang::get('Name') }}</th>
        <th class="text-center">{{ Lang::get('Type_id') }}</th>
        <th class="text-center">{{ Lang::get('Ações') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($alternatives as $alternative)
        <tr id="line{{ $alternative->id }}">
            <td class="text-center">{{ $alternative->id }}</td>
            <td>{{ $alternative->name }}</td>
            <td class="text-center">{{ $alternative->type_id }}</td>
            <td class="text-center">
                <div class="list-inline">
                    <a href="{{ URL::route('alternatives.show', $alternative->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('alternatives.edit', $alternative->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('alternatives.destroy', $alternative->id) }}"
                       data-id="{{ $alternative->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>

@stop