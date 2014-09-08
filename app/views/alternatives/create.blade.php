@extends('templates.default')

@section('title'){{ Lang::get('Criar Alternativa') }} @stop

@section('content')
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'alternatives')) }}

    <div class="form-group">
        {{ Form::label('name', Lang::get('Nome')) }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => Lang::get('nome')]) }}
    </div>
    <div class="form-group">
        {{ Form::label('type', Lang::get('Tipo')) }}
        {{ Form::select('type_id', $types, Input::old('type_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Lang::get('Criar Alternativa'), array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@stop