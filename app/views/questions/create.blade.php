@extends('templates.default')

@section('title'){{ Lang::get('Criar Avaliação') }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'questions']) }}

    <div class="form-group">
        {{ Form::label('statement', Lang::get('Enunciado')) }}
        {{ Form::text('statement', Input::old('statement'), ['class' => 'form-control', 'placeholder' => Lang::get('enunciado')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_about_assessable', Lang::get('É sobre avaliado?')) }}
        {{ Form::checkbox('is_about_assessable', Input::old('is_about_assessable'), false) }}
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Lang::get('Título')) }}
        {{ Form::select('title_id', $titles, Input::old('title_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('weight', Str::title(Lang::get('peso'))) }}
        {{ Form::text('weight', Input::old('weight'), ['class' => 'form-control', 'placeholder' => Lang::get('peso')]) }}
    </div>

    {{ Form::submit(Lang::get('Criar Avaliação'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop