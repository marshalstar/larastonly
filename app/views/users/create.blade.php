{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'users')) }}

<div class="form-group">
    {{ Form::label('username', 'Nome') }}
    {{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => Lang::get('email@exemplo.com')]) }}
</div>

<div class="form-group">
    {{ Form::label('password', 'Senha') }}
    {{ Form::password('password', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('password_confirmation', 'Confirmação de Senha') }}
    {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('speciality', 'Especialidade') }}
    {{ Form::text('speciality', Input::old('speciality'), ['class' => 'form-control', 'placeholder' => Lang::get('especialidade')]) }}
</div>

<div class="form-group">
    {{ Form::label('is_admin', 'É administrador?') }}
    {{ Form::checkbox('is_admin', Input::old('is_admin'), false) }}
</div>

<div class="form-group">
    {{ Form::label('gender', 'Sexo') }}
    {{ Form::select('gender', ['f' => 'feminino', 'm' => 'masculino'], Input::old('gender'), ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('biography', 'Biografia') }}
    {{ Form::textarea('biography', Input::old('biography'), ['class' => 'form-control', 'placeholder' => Lang::get('biografia')]) }}
</div>

<div class="form-group">
    {{ Form::label('picture_url', 'Url da imagem') }}
    {{ Form::text('picture_url', Input::old('pictureUrl'), ['class' => 'form-control', 'placeholder' => Lang::get('url da imagem')]) }}
</div>

{{ Form::submit('Criar Usuario', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}