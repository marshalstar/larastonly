{{ HTML::ul($errors->all()) }}

{{ Form::open(['url' => 'tags']) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Criar Tag', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}