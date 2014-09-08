@extends ('layout.main')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@section('conteudo')
<a href="{{ URL::to('checklists/create') }}"><button class="btn btn-default" type="submit" name="cadastrar"> <span class="glyphicon glyphicon-plus"></span> Novo checklist </button></a>

<table class = "table table-condensed" "table table-stripped">
    <div class="row">
    <tr>
        <th><label for="id">ID</label></th>
        <th><label for="name">Nome</label></th>
        <th><label for="user_id">User_id</label></th>
        <th><label for ="title_id">Title_id</label></th>
        <th><label for="actions">Ações</label></th>
    </tr>

    @foreach ($checklists as $checklist)
    <tr>
        <td>{{ $checklist->id }}</td>
        <td>{{ $checklist->name }}</td>
        <td>{{ $checklist->user_id }}</td>
        <td>{{ $checklist->title_id }}</td>
        <td>
            <a href="{{ URL::route('checklists.show', $checklist->id) }}"> <button class="btn btn-success" type="submit" name="mostrar"> <span class="glyphicon glyphicon-eye-open"> Mostrar checklist</span></button></a>

            <a href="{{ URL::route('checklists.edit', $checklist->id) }}"><button class="btn btn-info" type="submit" name="editar"> <span class="glyphicon glyphicon-edit"> Editar checklist </span></button></a>

            {{ Form::open(array('url' => 'checklists/' . $checklist->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar checklist', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>
</div>
@stop