@extends('templates.index')

@section('title'){{ Str::title(Lang::get('questões')) }} @stop

@section('novo')
<a href="{{ URL::to('questions/create') }}" class="btn btn-sm btn-primary primary-btn" data-loading-text="{{ Lang::get('carregando').'...' }}"><span class="glyphicon glyphicon-plus"></span> {{ Lang::get('Nova Questão') }}</a>
@stop

@section('table-data')

    <tr>
        <th class="text-center">{{ Lang::get('Id') }}</th>
        <th class="text-center">{{ Lang::get('Enunciado') }}</th>
        <th class="text-center">{{ Lang::get('Título_id') }}</th>
        <th class="text-center">{{  Lang::get('É sobre avaliado?')}}
        <th class="text-center">{{  Lang::get('Peso')}}
        <th class="text-center">{{ Lang::get('Ações') }}</th>
    </tr>

    @foreach ($questions as $question)
        <tr id="line{{ $question->id }}">
            <td class="text-center">{{ $question->id }}</td>
            <td>{{ Str::limit($question->statement, 37) }}</td>
            <td class="text-center">{{ $question->title_id }}</td>
            <td class="text-center">{{$question->is_about_assessable}}</td>
            <td class="text-center">{{$question->weight}}</td>
            <td class="text-center">
                <div class="list-inline">
                    <a href="{{ URL::route('questions.show', $question->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>
                    <a href="{{ URL::route('questions.edit', $question->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>
                    <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('questions.destroy', $question->id) }}"
                       data-id="{{ $question->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>
                </div>
            </td>
        </tr>
    @endforeach

@stop