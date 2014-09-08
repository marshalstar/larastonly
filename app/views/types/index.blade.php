
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('types/create') }}">Nova type</a>

<table>

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>ações</th>
    </tr>

    @foreach ($types as $type)
    <tr>
        <td>{{ $type->id }}</td>
        <td>{{ $type->name }}</td>
        <td>
            <a href="{{ URL::route('types.show', $type->id) }}">Mostrar type</a>
            <a href="{{ URL::route('types.edit', $type->id) }}">Editar type</a>
            {{ Form::open(array('url' => 'types/' . $type->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar type', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>