Editando {{ $tag->name }}

{{ HTML::ul($errors->all()) }}

{{ Form::model($tag, array('route' => ['tags.update', $tag->id], 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Editar Tag', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}