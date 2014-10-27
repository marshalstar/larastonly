@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Alterar senha')) }} @stop

@section('content')
<div class="container container-main">
     <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Mudar minha senha.
            
          </p>
    {{ HTML::ul($errors->all()) }}

    @if (isset($user))
        {{ Form::model($user, ['route' => ['changepassword'], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(array('route' => 'changepassword', 'class' => 'form-horizontal')) }}
    @endif

    <div class="form-group required">
        {{ Form::label('old_password', Str::title(Lang::get('Senha Atual')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::password('old_password', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('Senha Atual')]) }}
        </div>
    </div>

   <div class="form-group required">
        {{ Form::label('password', Str::title(Lang::get('Nova Senha')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::password('password', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('Nova Senha')]) }}
        </div>
    </div>
      <div class="form-group required">
        {{ Form::label('password_confirmation', Str::title(Lang::get('Confirmação de  Senha')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::password('password_confirmation', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('Confirmação de Senha')]) }}
        </div>
    </div>

        @include('templates.partials.formSubmit', ['msg' => Lang::get('Alterar Senha')])

    {{ Form::close() }}
</div>
@stop


