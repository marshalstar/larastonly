@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo usuário')) }} @stop

@section('content')

    <div class="container" style="display: block; background-color: white; padding: 10px;">

        {{ HTML::ul($errors->all()) }}

        {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) }}

        <div class="form-group input-group">
            {{ Form::label('username', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
            {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('email', Str::title(Lang::get('email')), ['class' => 'input-group-addon']) }}
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => Lang::get('email@exemplo.com')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('password', Str::title(Lang::get('senha')), ['class' => 'input-group-addon']) }}
            {{ Form::password('password', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('password_confirmation', Str::title(Lang::get('confirmação de senha')), ['class' => 'input-group-addon']) }}
            {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('speciality', Str::title(Lang::get('especialidade')), ['class' => 'input-group-addon']) }}
            {{ Form::text('speciality', null, ['class' => 'form-control', 'placeholder' => Lang::get('especialidade')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('is_admin', Str::title(Lang::get('é administrado?')), ['class' => 'input-group-addon']) }}
            {{ Form::checkbox('is_admin', null, false) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('gender', Str::title(Lang::get('sexo')), ['class' => 'input-group-addon']) }}
            {{ Form::select('gender', ['f' => 'feminino', 'm' => 'masculino'], null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('biography', Str::title(Lang::get('biografia')), ['class' => 'input-group-addon']) }}
            {{ Form::textarea('biography', null, ['class' => 'form-control', 'placeholder' => Lang::get('biografia')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('picture_url', Str::title(Lang::get('url do retrato')), ['class' => 'input-group-addon']) }}
            {{ Form::text('picture_url', null, ['class' => 'form-control', 'placeholder' => Lang::get('url da imagem')]) }}
        </div>

        {{ Form::submit(Str::title(Lang::get('novo usuário')), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@stop