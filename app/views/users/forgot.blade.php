@extends('templates.default')

@section('title'){{ Str::title(Lang::get('novo usuário')) }} @stop

@section('content')
<div class="container container-main">
   <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('users.login')}}" title = "Voltar a página de login"> Login </a>
            / Esqueci minha senha.
          </p>
    {{ HTML::ul($errors->all()) }}

    @if (isset($user))
        {{ Form::model($user, ['route' => ['forgot'], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(array('route' => 'forgot', 'class' => 'form-horizontal')) }}
    @endif

    <div class="form-group required">
        {{ Form::label('email', Str::title(Lang::get('email')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::email('email', isset($user)? null : Input::old('email'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('email@exemplo.com')]) }}
        </div>
    </div>


    @include('templates.partials.formSubmit', ['msg' => Lang::get('Enviar')])

    {{ Form::close() }}

</div>


@stop