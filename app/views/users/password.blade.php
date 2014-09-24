@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Mugar senha')) }} @stop

@section('content')

   <div class="container container-main">
	{{HTML::ul($errors->all())}}
	{{ Form::open(array('route'=>'changepassword')) }}
	   <div class="form-group input-group">
            {{ Form::label('old_password', Str::title(Lang::get('Senha Atual')), ['class' => 'input-group-addon']) }}
            {{ Form::password('old_password', ['class' => 'form-control', 'placeholder' => Lang::get('')]) }}
        </div>

        <div class="form-group input-group">
            {{ Form::label('password', Str::title(Lang::get('Nova Senha')), ['class' => 'input-group-addon']) }}
            {{ Form::password('password', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group input-group">
		{{Form::label('new_password', Str::title(Lang::get('Digite a senha novamente')), ['class' => 'input-group-addon']) }}
		{{Form::password('password_again', null, ['class' => 'form-control'])}}
        </div>
    

	{{ Form::submit(Str::title(Lang::get('Mudar Senha')), array('class' => 'btn btn-primary')) }}
        {{Form::token()}}
        {{ Form::close() }}

   </div>
@stop
