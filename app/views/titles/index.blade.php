
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('titles/create') }}">Nova title</a>

<table>

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>pai</th>
        <th>ações</th>
    </tr>

    @foreach ($titles as $title)
    <tr>
        <td>{{ $title->id }}</td>
        <td>{{ $title->name }}</td>
        <td>{{ $title->title_id }}</td>
        <td>
            <a href="{{ URL::route('titles.show', $title->id) }}">Mostrar title</a>
            <a href="{{ URL::route('titles.edit', $title->id) }}">Editar title</a>
            {{ Form::open(array('url' => 'titles/' . $title->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar title', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>