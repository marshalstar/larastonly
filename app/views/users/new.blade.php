@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo usuário')) }} @stop

@section('content')

<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('route' => 'users.new')) }}
    <div class="form-group input-group">
        {{ Form::label('username', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
        {{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('email', Str::title(Lang::get('email')), ['class' => 'input-group-addon']) }}
        {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => Lang::get('email@exemplo.com')]) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('password', Str::title(Lang::get('senha')), ['class' => 'input-group-addon']) }}
        {{ Form::password('password', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('password_confirmation', Str::title(Lang::get('confirmação de senha')), ['class' => 'input-group-addon']) }}
        {{ Form::password('password_confirmation', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('novo usuário')), array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@stop