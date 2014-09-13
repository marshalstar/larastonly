@extends('templates.index')

@section('title'){{ Str::title(Lang::get('alternativas')) }} @stop

@section('create'){{ URL::to('alternatives/create') }} @stop
@section('label-create'){{ Lang::get('nova alternativa') }} @stop

@section('table-data')

    <tr>
        <th>{{ Lang::get('Id') }}</th>
        <th>{{ Lang::get('Name') }}</th>
        <th>{{ Lang::get('Type_id') }}</th>
        <th>{{ Lang::get('Ações') }}</th>
    </tr>

    @foreach ($alternatives as $alternative)
        <tr id="line{{ $alternative->id }}">
                <td>{{ $alternative->id }}</td>
                <td>{{ $alternative->name }}</td>
                <td>{{ $alternative->type_id }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ URL::route('alternatives.show', $alternative->id) }}" class="btn btn-sm btn-info">{{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('alternatives.edit', $alternative->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('alternatives.destroy', $alternative->id) }}"
                       data-id="{{ $alternative->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in">{{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach

@stop