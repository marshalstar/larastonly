@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('novo usuário')) }} @stop
@section('content')
<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($user))
        {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(array('route' => 'users.new', 'class' => 'form-horizontal')) }}
    @endif

    <div class="form-group required">
       
            {{ Form::label('username', String::capitalize(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
            <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('username', isset($user)? null : Input::old('username'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        {{ Form::label('email', String::capitalize(Lang::get('email')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
           {{ Form::email('email', isset($user)? null : Input::old('email'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('email@exemplo.com')]) }}  
        </div>
    </div>

    <div class="form-group required">
        <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        {{ Form::label('password', String::capitalize(Lang::get('senha')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::password('password', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('senha')]) }}
        </div>
    </div>

    <div class="form-group required">
        <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        {{ Form::label('password_confirmation', String::capitalize(Lang::get('confirmação de senha')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::password('password_confirmation', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('confirmação da senha')]) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Cadastrar')])

    {{ Form::close() }}
</div>
@stop