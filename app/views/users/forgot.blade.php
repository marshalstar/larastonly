@extends('templates.default')
@section('title'){{ Str::title(Lang::get('Recuperar Conta')) }} @stop
@section('content')

  <div class="container container-main">
	{{HTML::ul($errors->all())}}
	{{ Form::open(array('route'=>'forgot')) }}
	
	  <div class="form-group input-group">
            {{ Form::label('email', Str::title(Lang::get('email')), ['class' => 'input-group-addon']) }}
            {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => Lang::get('email@exemplo.com')]) }}
            @if($errors->has('email'))
            {{$errors->first('email')}}
            @endif
        </div>

       

	{{ Form::submit(Str::title(Lang::get('Recuperar conta')), array('class' => 'btn btn-primary')) }}
        {{Form::token()}}
        {{ Form::close() }}

   </div>

@stop
