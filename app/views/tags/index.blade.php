@extends('templates.index')

@section('title'){{ Str::title(Lang::get('tags')) }} @stop

@section('novo')
<a href="{{ URL::to('tags/create') }}" class = "btn btn-sm btn-info">{{ Str::title(Lang::get('nova tag')) }}</a>
@stop

@section('table-data')

<tr>
    <th>{{ Lang::get('ID') }}</th>
    <th>{{ Lang::get('Nome') }}</th>
    <th>{{ Lang::get('Ações') }}</th>
</tr>

@foreach ($tags as $tag)
<tr id="line{{$tag->id }}">
    <td>{{ $tag->id }}</td>
    <td>{{ $tag->name }}</td>
    <td>
        <div class = "btn-group">
            <a href="{{ URL::route('tags.show', $tag->id) }}" class="btn btn-sm btn-info">{{ Lang::get('Exibir') }}</a>
            <a href="{{ URL::route('tags.edit', $tag->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('Editar') }}</a>
            <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('tags.destroy', $tag->id) }}"
               data-id="{{ $tag->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in">{{ Lang::get('Deletar') }}</a>
        </div>
    </td>
</tr>
@endforeach

@stop