@extends('layout.main')

@section('conteudo')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<a href="{{ URL::to('alternatives/create') }}"><button class="btn btn-success">Nova alternativa</button></a>
<div class="panel panel-default">
  <div class="panel-heading">Visualização das Alternativas.</div>
<table class="table table-condensed">

    <tr>
        <th><label for="id">ID</label></th>
        <th><label for="statement"></label>Statement</th>
        <th><label for="actions"></lbel> Ações </th>
    </tr>

    @foreach ($alternatives as $alternative)
    <tr>
        <td>{{ $alternative->id }}</td>
        <td>{{ $alternative->statement }}</td>
        <td>
            <a href="{{ URL::route('alternatives.show', $alternative->id) }}">
            <button class="btn btn-success " type="submit" value="MostarAlternativa">Mostrar Alternativa</button></a>
            <a href="{{ URL::route('alternatives.edit', $alternative->id) }}"><button class="btn btn-info" type ="submit" value="Editar">Editar Alternativa</button></a>
            {{ Form::open(array('url' => 'alternatives/' . $alternative->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Deletar alternative', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach

</table>
</div>
</div>
@stop