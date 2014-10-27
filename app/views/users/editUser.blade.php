@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Editar perfil')) }} @stop

@section('content')

<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($user, ['route' => ['editUser', $user->id], 'method' => 'POST', 'class' => 'form-horizontal']) }}
  

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

    <div class="form-group">
        {{ Form::label('speciality', String::capitalize(Lang::get('Conte-nos sua especialidade(profissão)')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('speciality', isset($user)? null : Input::old('speciality'), ['class' => 'form-control', 'placeholder' => Lang::get('especialidade')]) }}
        </div>
    </div>


    <div class="form-group">

         {{ Form::label('gender', String::capitalize(Lang::get('sexo')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('gender', ['f' => 'feminino', 'm' => 'masculino'], isset($user)? null : Input::old('gender'), ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('biography', String::capitalize(Lang::get('Sobre você')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::textarea('biography', isset($user)? null : Input::old('biography'), ['class' => 'form-control', 'placeholder' => Lang::get('biografia')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('picture_url', String::capitalize(Lang::get('URL da imagem')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('picture_url', isset($user)? null : Input::old('picture_url'), ['class' => 'form-control', 'placeholder' => Lang::get('url da imagem')]) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Cadastrar')])

    {{ Form::close() }}

</div>
@stop