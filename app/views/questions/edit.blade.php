@extends('templates.default')

@section('title'){{ Lang::get('Criar Avaliação') }} @stop

@section('content')

    {{ HTML::ul($errors->all()) }}

    {{ Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'PUT']) }}

    <div class="form-group">
        {{ Form::label('statement', Lang::get('Enunciado')) }}
        {{ Form::text('statement', null, ['class' => 'form-control', 'placeholder' => Lang::get('enunciado')]) }}
    </div>

    <div class="form-group">
        {{ Form::label('is_about_assessable', Lang::get('É sobre avaliado?')) }}
        {{ Form::checkbox('is_about_assessable', null, false) }}
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Lang::get('Título')) }}
        {{ Form::select('title_id', $titles, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('weight', Str::title(Lang::get('peso'))) }}
        {{ Form::text('weight', null, ['class' => 'form-control', 'placeholder' => Lang::get('peso')]) }}
    </div>

    {{ Form::submit(Lang::get('Criar Avaliação'), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop