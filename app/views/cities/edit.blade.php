@extends('templates.default')

@section('title'){{ Str::title(Lang::get('nova cidade')) }} @stop

@section('content')
<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($city, ['route' => ['cities.update', $city->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('state_id', Str::title(Lang::get('estado/província')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('state_id', $states, null, ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
            {{ Form::submit(Str::title(Lang::get('editar cidade')), ['class' => 'btn btn-primary']) }}
            {{ Form::reset(Str::title(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}
        </div>
    </div>

    {{ Form::close() }}

</div>
@stop