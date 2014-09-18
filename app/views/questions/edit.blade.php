@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Editar questão')) }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'PUT']) }}

    <div class="form-group input-group">
        {{ Form::label('statement', Str::title(Lang::get('enunciado')), ['class' => 'input-group-addon']) }}
        {{ Form::text('statement', null, ['class' => 'form-control', 'placeholder' => Lang::get('enunciado')]) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('is_about_assessable', Str::title(Lang::get('é sobre avaliado?')), ['class' => 'input-group-addon']) }}
        {{ Form::checkbox('is_about_assessable', null, false) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('title_id', Str::title(Lang::get('título')), ['class' => 'input-group-addon']) }}
        {{ Form::select('title_id', $titles, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('weight', Str::title(Lang::get('peso')), ['class' => 'input-group-addon']) }}
        {{ Form::text('weight', null, ['class' => 'form-control', 'placeholder' => Lang::get('peso')]) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('alternatives[]', Str::title(Lang::get('alternativas')), ['class' => 'input-group-addon']) }}
        {{ Form::select('alternatives[]', array_column(Alternative::all()->toArray(), 'name', 'id'), array_column($question->alternatives->toArray(), 'id', 'name'), ['class' => 'form-control', 'placeholder' => Lang::get('alternativas'), 'multiple']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('editar svaliação')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop