@extends('templates.index')

@section('title'){{ Str::title(Lang::get('tipos')) }} @stop

@section('novo')
<a href="{{ URL::to('types/create') }}" class="btn btn-sm btn-primary">{{ Lang::get('novo tipo') }}</a>
@stop

@section('table-data')

<tr>
    <th>{{ Lang::get('id') }}</th>
    <th>{{ Lang::get('nome') }}</th>
    <th>{{ Lang::get('ações') }}</th>
</tr>

@foreach ($types as $type)
<tr id="line{{$type->id }}">
    <td>{{ $type->id }}</td>
    <td>{{ $type->name }}</td>
    <td>
        <div class="btn-group">
            <a href="{{ URL::route('types.show', $type->id) }}" class="btn btn-sm btn-info">{{ Lang::get('mostrar tipo') }}</a>
            <a href="{{ URL::route('types.edit', $type->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('editar tipo') }}</a>
            <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('types.destroy', $type->id) }}"
               data-id="{{ $type->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in">{{ Lang::get('Deletar') }}</a>
        </div>
    </td>
</tr>
@endforeach

@stop