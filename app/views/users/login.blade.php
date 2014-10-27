@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo usuário')) }} @stop

@section('content')
<div class="container container-main">
     <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Login 
          </p>
    {{ HTML::ul($errors->all()) }}

    @if (isset($user))
        {{ Form::model($user, ['route' => ['users.login'], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(array('route' => 'users.login', 'class' => 'form-horizontal')) }}
    @endif

    <div class="form-group required">
        {{ Form::label('email', String::capitalize(Lang::get('email')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::email('email', isset($user)? null : Input::old('email'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('email@exemplo.com')]) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('password', String::capitalize(Lang::get('senha')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::password('password', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('senha')]) }}
              <a href="{{URL::route('forgot')}}"><i class="fa fa-refresh"></i> Esqueci minha senha</a>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
            <a href="{{URL::route('users.new')}}"><i class="fa fa-check-square-o"></i> Não possui uma conta? Cadastre-se.</a>
        </div>
    </div>


    @include('templates.partials.formSubmit', ['msg' => Lang::get('Login')]) 


    {{ Form::close() }}

</div>


@stop