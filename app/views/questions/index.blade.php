
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('questions/create') }}">Nova question</a>

<table>

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>type_id</th>
        <th>ações</th>
    </tr>

    @foreach ($questions as $question)
    <tr>
        <td>{{ $question->id }}</td>
        <td>{{ $question->name }}</td>
        <td>{{ $question->title_id }}</td>
        <td>
            <a href="{{ URL::route('questions.show', $question->id) }}">Mostrar question</a>
            <a href="{{ URL::route('questions.edit', $question->id) }}">Editar question</a>
            {{ Form::open(array('url' => 'questions/' . $question->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar question', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>