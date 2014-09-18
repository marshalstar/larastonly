@extends('templates.default')

@section('title'){{ Str::title(Lang::get('login')) }} @stop

@section('content')

   <div class="container containeri-main">
	{{HTML::ul($errors->all())}}
	{{ Form::open(array('route'=>['users-login-post'])) }}
	   <div class="form-group input-group">
            {{ Form::label('email', Str::title(Lang::get('email')), ['class' => 'input-group-addon']) }}
            {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => Lang::get('email@exemplo.com')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('password', Str::title(Lang::get('senha')), ['class' => 'input-group-addon']) }}
            {{ Form::password('password', null, ['class' => 'form-control']) }}
        </div>

	{{ Form::submit(Str::title(Lang::get('Entrar')), array('class' => 'btn btn-primary')) }}
        {{Form::token()}}
        {{ Form::close() }}


   </div>
@stop