
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('users/create') }}">Nova user</a>

<table>

    <tr>
        <th>id</th>
        <th>nome usuário</th>
        <th>email</th>
        <th>especialidade</th>
        <th>é administrador</th>
        <th>sexo</th>
        <th>biografia</th>
        <th>url imagem</th>
        <th>ações</th>
    </tr>

    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->speciality }}</td>
        <td>{{ $user->is_admin? 'sim' : 'não' }}</td>
        <td>{{ $user->gender }}</td>
        <td>{{ $user->biography }}</td>
        <td>{{ $user->picture_url }}</td>
        <td>
            <a href="{{ URL::route('users.show', $user->id) }}">Mostrar user</a>
            <a href="{{ URL::route('users.edit', $user->id) }}">Editar user</a>
            {{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar user', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>