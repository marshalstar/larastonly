
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('checklists/create') }}">{{ Lang::get('novo checklist') }}</a>

<table>

    <tr>
        <th>{{ Lang::get('id') }}</th>
        <th>{{ Lang::get('nome') }}</th>
        <th>{{ Lang::get('user_id') }}</th>
        <th>{{ Lang::get('title_id') }}</th>
        <th>{{ Lang::get('criado em') }}</th>
        <th>{{ Lang::get('atualizado a') }}</th>
        <th>ações</th>
    </tr>

    @foreach ($checklists as $checklist)
    <tr>
        <td>{{ $checklist->id }}</td>
        <td>{{ $checklist->name }}</td>
        <td>{{ $checklist->user_id }}</td>
        <td>{{ $checklist->title_id }}</td>
        <td>{{ $checklist->created_at->format('d/m/Y') }}</td>
        <td>{{ $checklist->updated_at->diffForHumans() }}</td>
        <td>
            <a href="{{ URL::route('checklists.show', $checklist->id) }}">{{ Lang::get('mostrar checklist') }}</a>
            <a href="{{ URL::route('checklists.edit', $checklist->id) }}">{{ Lang::get('editar checklist') }}</a>
            {{ Form::open(array('url' => 'checklists/' . $checklist->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit(Lang::get('deletar checklist'), array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>