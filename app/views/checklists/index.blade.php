
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('checklists/create') }}">Nova checklist</a>

<table>

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>user_id</th>
        <th>title_id</th>
        <th>ações</th>
    </tr>

    @foreach ($checklists as $checklist)
    <tr>
        <td>{{ $checklist->id }}</td>
        <td>{{ $checklist->name }}</td>
        <td>{{ $checklist->user_id }}</td>
        <td>{{ $checklist->title_id }}</td>
        <td>
            <a href="{{ URL::route('checklists.show', $checklist->id) }}">Mostrar checklist</a>
            <a href="{{ URL::route('checklists.edit', $checklist->id) }}">Editar checklist</a>
            {{ Form::open(array('url' => 'checklists/' . $checklist->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar checklist', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>