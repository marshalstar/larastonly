@extends('templates.index')

@section('title'){{ Str::title(Lang::get('títulos')) }} @stop

@section('novo')
<a href="{{ URL::to('titles/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('Novo Título') }}</a>
@stop

@section('table-data')

    <tr>
        <th class="text-center">{{ Lang::get('Id') }}</th>
        <th class="text-center">{{ Lang::get('Nome') }}</th>
        <th class="text-center">{{  Lang::get('Title_id')}}</th>
        
        <th class="text-center">{{ Lang::get('Ações') }}</th>
        
    </tr>

    @foreach ($titles as $title)
        <tr id="line{{ $title->id }}">
            <td class="text-center">{{ $title->id }}</td>
            <td>{{ Str::limit($title->name, 37) }}</td>
            <td class="text-center">{{$title->title_id}}</td>
                <td class="text-cent">
                <div class="list-inline">
                    <a href="{{ URL::route('titles.show', $title->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('titles.edit', $title->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('titles.destroy', $title->id) }}"
                       data-id="{{ $title->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach

@stop