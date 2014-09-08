{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'tags')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Criar Tag', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}