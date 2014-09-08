
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('tags/create') }}">Nova tag</a>

<table>

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>ações</th>
    </tr>

    @foreach ($tags as $tag)
    <tr>
        <td>{{ $tag->id }}</td>
        <td>{{ $tag->name }}</td>
        <td>
            <a href="{{ URL::route('tags.show', $tag->id) }}">Mostrar tag</a>
            <a href="{{ URL::route('tags.edit', $tag->id) }}">Editar tag</a>
            {{ Form::open(array('url' => 'tags/' . $tag->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar tag', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>