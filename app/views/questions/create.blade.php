@extends('templates.default')

@section('title'){{ Str::title(Str::title(Lang::get('nova questão'))) }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'questions']) }}

    <div class="form-group">
        {{ Form::label('statement', Str::title(Lang::get('enunciado'))) }}
        {{ Form::text('statement', Input::old('statement'), ['class' => 'form-control', 'placeholder' => Lang::get('enunciado')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_about_assessable', Str::title(Lang::get('é sobre avaliado?'))) }}
        {{ Form::checkbox('is_about_assessable', Input::old('is_about_assessable'), false) }}
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Str::title(Lang::get('título'))) }}
        {{ Form::select('title_id', $titles, Input::old('title_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('weight', Str::title(Lang::get('peso'))) }}
        {{ Form::text('weight', Input::old('weight'), ['class' => 'form-control', 'placeholder' => Lang::get('peso')]) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('nova avaliação')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop