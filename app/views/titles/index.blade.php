@extends('templates.index')

@section('title'){{ Str::title(Lang::get('títulos')) }} @stop

@section('novo')
<a href="{{ URL::to('titles/create') }}" class="btn btn-sm btn-info">{{ Lang::get('novo título') }}</a>
@stop

@section('table-data')

<tr>
    <th>{{ Lang::get('id') }}</th>
    <th>{{ Lang::get('nome') }}</th>
    <th>{{ Lang::get('título pai') }}</th>
    <th>{{ Lang::get('ações') }}</th>
</tr>

@foreach ($titles as $title)
<tr id="line{{$title->id }}">
    <td>{{ $title->id }}</td>
    <td>{{ $title->name }}</td>
    <td>{{ ($pai = $title->title_id)? $pai : Lang::get('sem pai') }}</td>
    <td>
        <div class = "btn-group">
            <a href="{{ URL::route('titles.show', $title->id) }}" class="btn btn-sm btn-info">{{ Lang::get('mostrar título') }}</a>
            <a href="{{ URL::route('titles.edit', $title->id) }}" class="btn btn-sm btn-warning">{{ Lang::get('editar título') }}</a>
            <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('titles.destroy', $title->id) }}"
               data-id="{{ $title->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in">{{ Lang::get('Deletar') }}</a>
        </div>
    </td>
</tr>
@endforeach

@stop