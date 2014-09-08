
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('evaluations/create') }}">Nova evaluation</a>

<table>

    <tr>
        <th>id</th>
        <th>comentario</th>
        <th>user_id</th>
        <th>checklist_id</th>
        <th>criado em</th>
        <th>editado em</th>
        <th>ações</th>
    </tr>

    @foreach ($evaluations as $evaluation)
    <tr>
        <td>{{ $evaluation->id }}</td>
        <td>{{ $evaluation->commentary }}</td>
        <td>{{ $evaluation->user_id }}</td>
        <td>{{ $evaluation->checklist_id }}</td>
        <td>{{ $evaluation->created_at }}</td>
        <td>{{ $evaluation->updated_at }}</td>
        <td>
            <a href="{{ URL::route('evaluations.show', $evaluation->id) }}">Mostrar evaluation</a>
            <a href="{{ URL::route('evaluations.edit', $evaluation->id) }}">Editar evaluation</a>
            {{ Form::open(array('url' => 'evaluations/' . $evaluation->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar evaluation', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>