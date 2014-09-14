@extends('templates.index')

@section('title'){{ Str::title(Lang::get('questões')) }} @stop

@section('novo')
<a href="{{ URL::to('questions/create') }}" class="btn btn-sm btn-info">{{ Str::title(Lang::get('nova questão')) }}</a>
@stop

@section('table-data')

<tr>
    <th>{{ Lang::get('Id') }}</th>
    <th>{{ Lang::get('Enunciado') }}</th>
    <th>{{ Lang::get('Type_id') }}</th>
    <th>{{ Lang::get('É sobre avaliado?') }}</th>
    <th>{{ Lang::get('Peso') }}</th>
    <th>{{ Lang::get('Ações') }}</th>
</tr>

@foreach ($questions as $question)
<tr id="line{{$question->id }}">
    <td>{{ $question->id }}</td>
    <td>{{ Str::limit($question->statement, 64) }}</td>
    <td>{{ $question->title_id }}</td>
    <td>{{ $question->is_about_assessable? Lang::get('sim') : Lang::get('não') }}</td>
    <td>{{ $question->weight }}</td>
    <td>
        <div class = "btn-group">
            <a href="{{ URL::route('questions.show', $question->id) }}" class = "btn btn-sm btn-info">{{ Lang::get('Exibir') }}</a>
            <a href="{{ URL::route('questions.edit', $question->id) }}"class="btn btn-sm btn-warning">{{ Lang::get('Editar') }}</a>
            <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="{{ URL::route('questions.destroy', $question->id) }}"
               data-id="{{ $question->id }}" href="#destroy-dialog" data-effect="mfp-zoom-in">{{ Lang::get('Deletar') }}</a>
        </div>
    </td>
</tr>
@endforeach

@stop