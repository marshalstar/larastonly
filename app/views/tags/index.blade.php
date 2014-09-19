@extends('templates.index')

@section('title'){{ Str::title(Lang::get('tags')) }} @stop

@section('novo')
<a href="{{ URL::to('tags/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('Nova Tag') }}</a>
@stop

@section('table-data')

    <tr>
        <th class="text-center">{{ Lang::get('Id') }}</th>
        <th class="text-center">{{ Lang::get('Nome') }}</th>
        <th class="text-center">{{ Lang::get('Ações') }}</th>
        
    </tr>

    @foreach ($tags as $tag)
        <tr id="line{{ $tag->id }}">
            <td class="text-center">{{ $tag->id }}</td>
            <td>{{ Str::limit($tag->name, 37) }}</td>
            <td class="text-center">
                <div class="list-inline">
                    <a href="{{ URL::route('tags.show', $tag->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('tags.edit', $tag->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('tags.destroy', $tag->id) }}"
                       data-id="{{ $tag->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach

@stop