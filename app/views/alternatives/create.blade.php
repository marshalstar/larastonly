@extends('templates.default')

@section('title')Criar Alternativa @stop

@section('content')
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'alternatives')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'nome']) }}
    </div>
    <div class="form-group">
        {{ Form::label('type', 'Tipo') }}
        {{ Form::select('type_id', $types, Input::old('type_id'), ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Criar Alternative', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@stop