@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar')). ' ' .$alternative->name }} @stop

@section('content')

    <div class="container container-main">

        {{ HTML::ul($errors->all()) }}

        {{ Form::model($alternative, ['route' => ['alternatives.update', $alternative->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

        <div class="form-group required">
            {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
            <div class="col-lg-10 col-sm-8">
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('type', Str::title(Lang::get('tipo')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
            <div class="col-lg-10 col-sm-8">
                {{ Form::select('type_id', $types, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
                {{ Form::submit(Str::title(Lang::get('nova lugar')), ['class' => 'btn btn-primary']) }}
                {{ Form::reset(Str::title(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>

@stop