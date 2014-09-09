@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo usuário')) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'users')) }}

    <div class="form-group">
        {{ Form::label('username', Str::title(Lang::get('nome'))) }}
        {{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', Str::title(Lang::get('email'))) }}
        {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => Lang::get('email@exemplo.com')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', Str::title(Lang::get('senha'))) }}
        {{ Form::password('password', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('password_confirmation', Str::title(Lang::get('confirmação de senha'))) }}
        {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('speciality', Str::title(Lang::get('especialidade'))) }}
        {{ Form::text('speciality', Input::old('speciality'), ['class' => 'form-control', 'placeholder' => Lang::get('especialidade')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_admin', Str::title(Lang::get('é administrado?'))) }}
        {{ Form::checkbox('is_admin', Input::old('is_admin'), false) }}
    </div>

    <div class="form-group">
        {{ Form::label('gender', Str::title(Lang::get('sexo'))) }}
        {{ Form::select('gender', ['f' => 'feminino', 'm' => 'masculino'], Input::old('gender'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('biography', Str::title(Lang::get('biografia'))) }}
        {{ Form::textarea('biography', Input::old('biography'), ['class' => 'form-control', 'placeholder' => Lang::get('biografia')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('picture_url', Str::title(Lang::get('url do retrato'))) }}
        {{ Form::text('picture_url', Input::old('picture_url'), ['class' => 'form-control', 'placeholder' => Lang::get('url da imagem')]) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('novo usuário')), array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@stop